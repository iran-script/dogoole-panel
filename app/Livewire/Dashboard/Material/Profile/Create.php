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
    public $activitiesSelect=[];

    public function mount()
    {
        $this->categories = app(CategoryRepository::class)->get(['parent_id' => 0]);
        if ($this->categories == null)
            $this->dispatch('notification', message: __('messages.error response category'));
        $this->areas = $this->getArea();
        $this->activities = app(ActivityRepository::class)->get();

    }


    public function getArea($parentId = 0)
    {
        $area = app(AreaRepository::class)->get(['parent_id' => $parentId]);
        if ($this->areas == null)
            $this->dispatch('notification', message: __('messages.error response category'));
        return $area;
    }

    public function changeArea($parentId)
    {
        $this->areasLevel2 = $this->getArea($parentId);

    }

    public function setChange()
    {

        $this->validate();

        $dataUser = ['name' => $this->firstName, 'family' => $this->lastName, 'mobile' => $this->mobile];

        $userRep = app(UserRepository::class)->store($dataUser);
        if (isset($userRep['statusCode']) and $userRep['statusCode'] == 400)
            $this->dispatch('notification', message: $userRep['errors'][0]);
        else if ($userRep == null)
            $this->dispatch('notification', message: __('messages.error request'));
        else {

            $dataVendor = [
                "title" => $this->branchName,
                "user_id" => $userRep['id'],
            ];
            $vendor = app(VendorRepository::class)->store($dataVendor);
            if (isset($vendor['statusCode']) and $userRep['statusCode'] == 400)
                $this->dispatch('notification', message: $userRep['errors'][0]);
            else if ($vendor == null)
                $this->dispatch('notification', message: __('messages.error request'));
            else {
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
                    "vendor_id" => $vendor['id'],
                    "activities" => json_encode($this->activitiesSelect),
                ];
                $path = $this->upload($this->image) ?? "";
                $dataBranch['logo'] = $path;
                $branch = app(BranchRepository::class)->store($dataBranch);
                if (isset($branch['statusCode']) and $branch['statusCode'] == 400)
                    $this->dispatch('notification', message: $branch['errors'][0]);
                else if ($branch == null)
                    $this->dispatch('notification', message: __('messages.error request'));
                else {
                    session()->flash('notification', __('messages.success request'));
                    $this->redirectRoute('admin.branch.index');
                }
            }
        }
    }


    public function render()
    {
        return view('livewire.dashboard.branch.create')->extends('layouts.app');
    }
}
