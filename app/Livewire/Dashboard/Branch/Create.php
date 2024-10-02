<?php

namespace App\Livewire\Dashboard\Branch;

use App\Repositories\Activity\ActivityRepository;
use App\Repositories\Area\AreaRepository;
use App\Repositories\Branch\BranchRepository;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\User\UserRepository;
use App\Repositories\Vendor\VendorRepository;
use App\Traits\GuzzleTrait;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    use GuzzleTrait;

    #[Validate('required|image')]
    public $image = "";

    #[Validate('required|image')]
    public $cover = "";

    public $categories = [];


    #[Validate('required|numeric')]
    public $categoryId;

    #[Validate('required')]
    public $branchName;

    #[Validate('nullable')]
    public $description;

    #[Validate('nullable')]
    public $branchMetaSm;

    #[Validate('required')]
    public $lat;

    #[Validate('required')]
    public $lng;
    #[Validate('required|persian_alpha_num')]
    public $firstName;
    #[Validate('required|persian_alpha_num')]
    public $lastName;

    #[Validate('required|ir_mobile')]
    public $mobile;

    public $areas = [];

    public $areasLevel2 = [];

    #[Validate('required')]
    public $areaId;

    #[Validate('required')]
    public $branchAddress;

    public $branchMinOrder = 10;

    public $activities = [];

    public $activitiesSelect = [];
    public $categoryLevel2List = [];
    public $meals = [
        ['id' => 'breakfast', 'title' => 'breakfast'],
        ['id' => 'lunch', 'title' => 'lunch'],
        ['id' => 'dinner', 'title' => 'dinner'],
    ];
    public $mealsSelected = [];

    public function mount()
    {
        $this->categories = app(CategoryRepository::class)->get(['parent_id' => 0]);
        if ($this->categories == null)
            $this->dispatch('notification', message: __('messages.error response category'));
        $this->areas = $this->getArea();
        $this->activities = app(ActivityRepository::class)->getActivity();
    }

    public function getChildCategory($id)
    {
        $child = app(CategoryRepository::class)->get(['parent_id' => $id]);
        if ($child==null) {
            $this->categoryLevel2List=$child;
            $this->categoryId = $id;
        }
        else{
            $this->categoryLevel2List=$child;
        }

    }

    public function getArea($parentId = 0)
    {
        $area = app(AreaRepository::class)->get(['parent_id' => $parentId]);
        if ($area == null)
            $this->dispatch('notification', message: __('messages.error response area'));
        return $area;
    }


    public function changeArea($parentId)
    {
        $this->areasLevel2 = $this->getArea($parentId);
    }

    public function setChange()
    {
        $this->validate();
        $dataBranch = [
            "title" => $this->branchName,
            "address" => $this->branchAddress,
            "lat" => $this->lat,
            "lng" => $this->lng,
            "category_id" => $this->categoryId,
            "area_id" => $this->areaId,
            "min_order" => $this->branchMinOrder,
            "sm_description" => $this->branchMetaSm,
            "description" => $this->description,
            "activities" => json_encode($this->activitiesSelect),
            "meals" => json_encode($this->mealsSelected),
            'name' => $this->firstName, 'family' => $this->lastName, 'mobile' => $this->mobile
        ];
        $path = $this->upload($this->image) ?? "";
        $dataBranch['logo'] = $path;
        $pathCover = $this->upload($this->cover) ?? "";
        $dataBranch['cover'] = $pathCover;
        $branch = app(BranchRepository::class)->store($dataBranch);
        if ($branch['status'] == 400 || $branch['status'] == 500)
            $this->dispatch('notification', message: $branch['message'] ?? __('messages.error request'));
        else {
            session()->flash('notification', __('messages.success request'));
            $this->redirectRoute('admin.branch.index');
        }
    }

    public
    function render()
    {
        return view('livewire.dashboard.branch.create')->extends('layouts.app');
    }
}
