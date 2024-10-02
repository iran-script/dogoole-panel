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
use function Symfony\Component\Translation\t;

class Edit extends Component
{

    use WithFileUploads;

    use GuzzleTrait;

    #[Validate('nullable|image')]
    public $image = "";


    #[Validate('nullable|image')]
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
    #[Validate('required')]
    public $areas = [];
    #[Validate('required')]
    public $areasLevel2 = [];
    #[Validate('required')]
    public $areaId;
    public $areaId1;
    #[Validate('required')]
    public $branchAddress;


    #[Validate('required|boolean')]
    public $cashBackStatus = false;
    #[Validate('required|numeric|min:0|max:100')]
    public $cashBackPercent = 0;
    #[Validate('required|numeric|min:0')]
    public $cashBackMaxPrice = 0;


    public $branchMinOrder = 10;

    public $branchId;

    public $beforeImage;
    public $beforeCover;

    public $activities = [];

    public $activitiesSelect = [];
    public $categoryIdLevel1;
    public $categoryLevel2List = [];
    public $branchStatus = ['active', 'disable', 'temporarily_disabled'];


    #[Validate('required')]
    public $status;

    public $meals = [
        ['id' => 'breakfast', 'title' => 'breakfast'],
        ['id' => 'lunch', 'title' => 'lunch'],
        ['id' => 'dinner', 'title' => 'dinner'],
    ];
    public $mealsSelected = [];

    public function mount($id = null)
    {
        if ($id == null)
            $id = session('role_id');
        $this->branchId = $id;
        $this->categories = app(CategoryRepository::class)->get(['parent_id' => 0]);
        if ($this->categories == null)
            $this->dispatch('notification', message: __('messages.error response category'));

        $this->areas = $this->getArea();

        $this->activities = app(ActivityRepository::class)->getActivity();

        $this->branch = app(BranchRepository::class)->find(['branch_id' => $id]);
        if ($this->branch == null)
            $this->dispatch('notification', message: __('messages.error response'));
//        dd($this->branch['id']);

        $this->branchMetaSm = $this->branch['sm_description'] ?? " ";
        $this->lng = $this->branch['lng'] ?? " ";
        $this->branchMinOrder = $this->branch['min_order'] ?? " ";
        $this->areaId = $this->branch['area_id'] ?? " ";
        $this->lat = $this->branch['lat'] ?? " ";
        $this->description = $this->branch['description'] ?? " ";
        $this->beforeImage = $this->branch['logo'] ?? " ";
        $this->beforeCover = $this->branch['cover'] ?? " ";
        $this->branchAddress = $this->branch['address'] ?? " ";
        $this->branchName = $this->branch['title'] ?? " ";


        $this->cashBackStatus = ($this->branch['cash_back_status'] == true) ? 1 : 0;
        $this->cashBackPercent = $this->branch['cash_back_percent'] ?? 0;
        $this->cashBackMaxPrice = $this->branch['cash_back_max_price'] ?? 0;


        $categoryId = $this->categoryId = $this->branch['category_id'] ?? null;
        $this->status = $this->branch['status'];


        if ($categoryId != null) {
            //search category1
            $result = array_filter($this->categories, function ($item) use ($categoryId) {
                return $item['id'] == $categoryId;
            });

            if (empty($result)) {
                $category = app(CategoryRepository::class)->find(['id' => $categoryId]);
                if ($category != null and $category['parent_id'] != 0) {

                    $child = app(CategoryRepository::class)->get(['parent_id' => $category['parent_id']]);
                    if ($child != null) {
                        $this->categoryLevel2List = $child;
                        $this->categoryIdLevel1 = $category['parent_id'];

                    }
                }
            } else {
                $this->categoryIdLevel1 = $categoryId;
            }
        }


        $this->activitiesSelect = json_decode($this->branch['activities'], true) ?? [];
        $this->mealsSelected = json_decode($this->branch['meals'], true) ?? [];

        $this->areaId1 = app(AreaRepository::class)->find(['area_id' => $this->areaId])['parent_id'] ?? null;
        if ($this->areaId1)
            $this->changeArea($this->areaId1);


    }

    public function getChildCategory($id)
    {
        $child = app(CategoryRepository::class)->get(['parent_id' => $id]);
        if ($child == null) {
            $this->categoryLevel2List = [];
            $this->categoryId = $id;
        } else {
            $this->categoryLevel2List = $child;
        }

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
            "lat" => $this->lat,
            "lng" => $this->lng,
            "category_id" => $this->categoryId,
            "area_id" => $this->areaId,
            "min_order" => $this->branchMinOrder,
            "sm_description" => $this->branchMetaSm,
            "description" => $this->description,
            'branch_id' => $this->branchId,
            "cover" => $this->cover,
            "cash_back_max_price" => $this->cashBackMaxPrice,
            "cash_back_status" => $this->cashBackStatus,
            "cash_back_percent" => $this->cashBackPercent,
            "status" => $this->status,
            "activities" => json_encode($this->activitiesSelect),
            "meals" => json_encode($this->mealsSelected),
        ];
        if ($this->image) {
            $path = $this->upload($this->image) ?? "";
            $dataBranch['logo'] = $path;
        } else {
            $dataBranch['logo'] = $this->beforeImage;

        }
        if ($this->cover) {
            $pathCover = $this->upload($this->cover) ?? "";
            $dataBranch['cover'] = $pathCover;
        } else {
            $dataBranch['cover'] = $this->beforeCover;

        }
        $branch = app(BranchRepository::class)->update($dataBranch);
        if (isset($branch['statusCode']) and $branch['statusCode'] == 400)
            $this->dispatch('notification', message: $branch['errors'][0]);
        else if ($branch == null)
            $this->dispatch('notification', message: __('messages.error request'));
        else {
            session()->flash('notification', __('messages.success request'));
            if (session('role_id') == 1)
                $this->redirectRoute('admin.branch.index');
            else
                $this->redirectRoute('admin.branch.edit');
        }
    }


    public function render()
    {
        return view('livewire.dashboard.branch.edit')->extends('layouts.app');
    }
}
