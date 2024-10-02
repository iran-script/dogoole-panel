<?php

namespace App\Livewire\Dashboard\Settings;

use App\Repositories\Setting\SettingRepository;
use App\Traits\GuzzleTrait;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class GeneralBranch extends Component
{
    use WithFileUploads;
    use GuzzleTrait;

    public $branchId;
    #[Validate('required')]
    public $settlementPeriod;

    #[Validate('required')]
    public $foodInBreakfast;
    #[Validate('required')]
    public $foodInLunch;

    #[Validate('required')]
    public $foodInDinner;


    public function setChange()
    {

        $this->validate();

        $data =
            [
                [
                    "name" => 'settlementPeriod',
                    'value' => $this->settlementPeriod,
                    "branch_id" => $this->branchId
                ],
                [
                    "name" => 'foodInBreakfast',
                    'value' => $this->foodInBreakfast,
                    "branch_id" => $this->branchId
                ],
                [
                    "name" => 'foodInLunch',
                    'value' => $this->foodInLunch,
                    "branch_id" => $this->branchId
                ],
                [
                    "name" => 'foodInDinner',
                    'value' => $this->foodInDinner,
                    "branch_id" => $this->branchId
                ],
            ];

        $setting = app(SettingRepository::class)->storeOrUpdate(['items' => $data]);
        if (isset($setting['statusCode']) and $setting['statusCode'] == 400)
            $this->dispatch('notification', message: $setting['errors'][0]);
        else if ($setting == null)
            $this->dispatch('notification', message: __('messages.error request'));


        $this->dispatch('notification', message: __('messages.success request'));
    }


    public function mount($id)
    {
        $this->branchId = $id;
        if ($this->branchId == null)
            abort(403);

        $settings = app(SettingRepository::class)->get(["names" => ["settlementPeriod", "foodInBreakfast", "foodInLunch", "foodInDinner"], "branch_id" => $this->branchId]);
        if ($settings == null)
            $this->dispatch('notification', message: __('messages.error response'));

        $this->settlementPeriod = $settings['settlementPeriod'] ?? " ";
        $this->foodInBreakfast = $settings['foodInBreakfast'] ?? " ";
        $this->foodInLunch = $settings['foodInLunch'] ?? " ";
        $this->foodInDinner = $settings['foodInDinner'] ?? " ";
    }


    public function render()
    {
        return view('livewire.dashboard.setting.general-branch')->extends('layouts.app');
    }
}
