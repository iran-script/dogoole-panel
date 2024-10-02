<?php

namespace App\Livewire\Dashboard\Discount;

use App\Repositories\Branch\BranchRepository;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Discount\DiscountRepository;
use App\Repositories\User\UserRepository;
use App\Repositories\Vendor\VendorRepository;
use App\Traits\GuzzleTrait;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Create extends Component
{
    use GuzzleTrait;

    //public
    #[Validate('required')]
    public $title;
    #[Validate('required|max:10')]
    public $discountCode;
    #[Validate('required')]
    public $discountType = 'public';
    #[Validate('required|numeric|min:1|max:99')]
    public $discountPercent;
    #[Validate('nullable|numeric|min:1')]
    public $limitUse;
    #[Validate('required|numeric|min:1000')]
    public $minOrderPrice;
    #[Validate('required|numeric|min:1000')]
    public $maxDiscountPrice;


    #[Validate('required|numeric|min:0|max:100')]
    public $percentBranch = 100;
    #[Validate('required|numeric|min:0|max:100')]
    public $percentSystem = 0;
    #[Validate('nullable|numeric|min:0')]
    public $usedCount;


    public $endDate;

    public $startDate;


    //limited
    #[Validate('required')]
    public $limitUseStatus = false;
    #[Validate('required')]
    public $limitUserStatus = false;
    public $limitBranchStatus = false;


    public function mount()
    {
    }

    public function setChange()
    {

        if ($this->startDate == null || $this->endDate == null)
            $this->dispatch('notification2', message: trans('index.enter discount date start and end date'));

        $this->validate();
        if (($this->percentBranch + $this->percentSystem) != 100) {
            $this->dispatch('notification2', message: __('index.The total percentage of the restaurant and the total percentage of the system should be 100'));
            return false;
        }

        $data = [
            "title" => $this->title,
            "code" => $this->discountCode,
            "percent" => $this->discountPercent,
            "active_from" => $this->startDate, // miladi
            "active_to" => $this->endDate,//miladi,
            "limit_user" => false,
            "limit_branch" => false,
            "used_count" => $this->usedCount ?? null,
            "max_price_discount" => $this->maxDiscountPrice,
            "min_price_order" => $this->minOrderPrice,
            "condition_type" => $this->discountType,
            "limit_uses" => $this->limitUse ?? null, //true || false
            "percent_branch" => $this->percentBranch, //true || false
            "percent_system" => $this->percentSystem, //true || false
            //"branch_id"=>"0",
            //"type"v"0" //0|1
        ];
        $store = app(DiscountRepository::class)->store($data);
        if (isset($store['statusCode']) and $store['statusCode'] == 400)
            $this->dispatch('notification', message: $store['error']);
        else if ($store == null)
            $this->dispatch('notification', message: __('messages.error request'));
        else {
            session()->flash('notification', __('index.The discount code has been successfully registered'));
            $this->redirectRoute('admin.discount.index');
        }

    }


    public function render()
    {
        return view('livewire.dashboard.discount.create')->extends('layouts.app');
    }
}
