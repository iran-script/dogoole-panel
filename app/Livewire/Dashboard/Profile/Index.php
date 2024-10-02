<?php
namespace App\Livewire\Dashboard\Profile;

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
use function Symfony\Component\Translation\t;

class Index extends Component
{
    use WithFileUploads;

    use GuzzleTrait;

    #[Validate('nullable|image')]
    public $image = "";
    public $categories = [];


    #[Validate('required|numeric')]
    public $categoryId;

    #[Validate('required')]
    public $branchName;

    #[Validate('required')]
    public $description;

    #[Validate('required')]
    public $branchMetaSm;
    #[Validate('required')]
    public $branchLat;
    #[Validate('required')]
    public $branchLang;

    public $areas = [];
    public $areasLevel2 = [];
    #[Validate('required')]
    public $areaId;
    public $areaId1;
    #[Validate('required')]
    public $branchAddress;
    public $branchMinOrder = 10;

    public $branchId;

    public $beforeImage;

    public $activities = [];
    public $activitiesSelect = [];

    public function mount($id)
    {
        $this->branchId = $id;
        $this->categories = app(CategoryRepository::class)->get(['parent_id' => 0]);
        if ($this->categories == null)
            $this->dispatch('notification', message: __('messages.error response category'));

        $this->areas = $this->getArea();

        $this->activities = app(ActivityRepository::class)->get();
        $this->branch = app(BranchRepository::class)->find(['branch_id' => $id]);
        if ($this->branch == null)
            $this->dispatch('notification', message: __('messages.error response'));

        $this->branchMetaSm = $this->branch['sm_description'] ?? " ";
        $this->branchLang = $this->branch['lng'] ?? " ";
        $this->branchMinOrder = $this->branch['min_order'] ?? " ";
        $this->areaId = $this->branch['area_id'] ?? " ";
        $this->categoryId = $this->branch['category_id'] ?? " ";
        $this->branchLat = $this->branch['lat'] ?? " ";
        $this->description = $this->branch['description'] ?? " ";
        $this->beforeImage = $this->branch['logo'] ?? " ";
        $this->branchAddress = $this->branch['address'] ?? " ";
        $this->branchName = $this->branch['title'] ?? " ";
        $this->activitiesSelect = json_decode($this->branch['activities'], true) ?? [];

        $this->areaId1 = app(AreaRepository::class)->find(['area_id' => $this->areaId])['parent_id'] ?? null;
        if ($this->areaId1)
            $this->changeArea($this->areaId1);


    }


    public function getArea($parentId = 0)
    {
        $area = app(AreaRepository::class)->get(['parent_id' => $parentId]);
//        if ($this->areas == null)
//            $this->dispatch('notification', message: __('messages.error response area'));
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
            "lat" => $this->branchLat,
            "lng" => $this->branchLang,
            "category_id" => $this->categoryId,
            "area_id" => $this->areaId,
            "min_order" => $this->branchMinOrder,
            "sm_description" => $this->branchMetaSm,
            "description" => $this->description,
            'branch_id' => $this->branchId,
            "activities" => json_encode($this->activitiesSelect),

        ];


        if ($this->image) {
            $path = $this->upload($this->image) ?? "";
            $dataBranch['logo'] = $path;
        }

        $branch = app(BranchRepository::class)->update($dataBranch);
        if (isset($branch['statusCode']) and $branch['statusCode'] == 400)
            $this->dispatch('notification', message: $branch['errors'][0]);
        else if ($branch == null)
            $this->dispatch('notification', message: __('messages.error request'));
        else {
            session()->flash('notification', __('messages.success request'));
        }
    }


    public function render()
    {
        return view('livewire.dashboard.profile.index')->extends('layouts.app');
    }
}
