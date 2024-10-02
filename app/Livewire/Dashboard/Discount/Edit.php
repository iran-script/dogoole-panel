<?php

namespace App\Livewire\Dashboard\Discount;

use App\Repositories\Discount\DiscountRepository;
use App\Traits\GuzzleTrait;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Edit extends Component
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


    public $discountId;


    public function mount($id)
    {
        $this->discountId = $id;
        $this->getdiscount($id);
    }

    public function getdiscount($id)
    {
        $discount = app(DiscountRepository::class)->find(['coupon_id' => $id]);
        if ($discount == null) {
            session()->flash('notification', __('messages.problem get data'));
            $this->redirectRoute('admin.discount.index');
        }

        $this->title = $discount['title'];
        $this->discountCode = $discount['code'];
        $this->discountType = $discount['condition_type'];
        $this->discountPercent = $discount['percent'];
        $this->limitUse = ($discount['limit_uses'] > 0)? $discount['limit_uses']:null;
        $this->minOrderPrice = $discount['min_price_order'];
        $this->maxDiscountPrice = $discount['max_price_discount'];
        $this->percentBranch = $discount['percent_branch'];
        $this->percentSystem = $discount['percent_system'];
        $this->usedCount = $discount['used_count'];
        $this->endDate = jdate($discount['active_to'])->format('Y/m/d');
        $this->startDate = jdate($discount['active_from'])->format('Y/m/d');
        $this->limitUseStatus = ($discount['limit_uses'] == null) ? false : "true";
    }

    public
    function setChange()
    {
        try {

            $this->validate();
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
                "coupon_id" => $this->discountId,
                //"branch_id"=>"0",
                //"type"v"0" //0|1
            ];
            $discount = app(DiscountRepository::class)->update($data);
            if ($discount != null) {
                session()->flash('notification', $discount);
                $this->redirectRoute('admin.discount.index', 0);
            } else
                $this->dispatch('notification', message: __('messages.error request'));
        } catch (\Exception $e) {
            dd($e);
        }
    }


    public
    function render()
    {
        return view('livewire.dashboard.discount.edit')->extends('layouts.app');
    }
}
