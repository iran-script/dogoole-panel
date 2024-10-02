<?php

namespace App\Livewire\Dashboard\Settings;

use App\Repositories\Setting\SettingRepository;
use App\Traits\GuzzleTrait;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class General extends Component
{
    use WithFileUploads;
    use GuzzleTrait;


    #[Validate('required')]
    public $shippingType;

    #[Validate('required')]
    public $shippingCost;

    #[Validate('required')]
    public $taxPercent = "";

    #[Validate('required')]
    public $maxDistance = "";

    #[Validate('required')]
    public $zarinpal;
    #[Validate('required')]
    public $fixedShippingCost;
    #[Validate('required')]
    public $fixedShippingKilometer;
    #[Validate('required')]
    public $foodProfit;
    #[Validate('required')]
    public $deliveryFreeKilometer;

    #[Validate('required')]
    public $percentageDeliver;

    #[Validate('required')]
    public $percentageSales;

    public function setChange()
    {

        $this->validate();

        $data =
            [
                [
                    "name" => 'zarinpal',
                    'value' => $this->zarinpal
                ],
                [
                    "name" => 'maxDistance',
                    'value' => $this->maxDistance
                ],
                [
                    "name" => 'taxPercent',
                    'value' => $this->taxPercent
                ],
                [
                    "name" => 'shippingCost',
                    'value' => $this->shippingCost
                ],
                [
                    "name" => 'fixedShippingCost',
                    'value' => $this->fixedShippingCost
                ],
                [
                    "name" => 'fixedShippingKilometer',
                    'value' => $this->fixedShippingKilometer
                ],
                [
                    "name" => 'foodProfit',
                    'value' => $this->foodProfit
                ],
                [
                    "name" => 'deliveryFreeKilometer',
                    'value' => $this->deliveryFreeKilometer
                ],
                [
                    "name" => 'percentageSales',
                    'value' => $this->percentageSales
                ],
                [
                    "name" => 'percentageDeliver',
                    'value' => $this->percentageDeliver
                ],
                [
                    "name" => 'shippingType',
                    'value' => $this->shippingType
                ]
            ];

        $setting = app(SettingRepository::class)->storeOrUpdate(['items' => $data]);
        if (isset($setting['statusCode']) and $setting['statusCode'] == 400)
            $this->dispatch('notification', message: $setting['errors'][0]);
        else if ($setting == null)
            $this->dispatch('notification', message: __('messages.error request'));

        session()->flash('notification', __('messages.success request'));
        $this->redirectRoute('admin.setting.general');
    }


    public function mount()
    {
        $settings = app(SettingRepository::class)->get(["names" => ["zarinpal", "maxDistance", "taxPercent",
            "shippingCost", "fixedShippingCost", "fixedShippingKilometer", "foodProfit",
            "deliveryFreeKilometer", "percentageSales", "percentageDeliver", "shippingType"
        ]]);
        if ($settings == null)
            $this->dispatch('notification', message: __('messages.error response'));

        $this->zarinpal = $settings['zarinpal'] ?? " ";
        $this->maxDistance = $settings['maxDistance'] ?? " ";
        $this->taxPercent = $settings['taxPercent'] ?? " ";
        $this->meta = $settings['title'] ?? " ";
        $this->shippingCost = $settings['shippingCost'] ?? " ";
        $this->foodProfit = $settings['foodProfit'] ?? " ";
        $this->fixedShippingKilometer = $settings['fixedShippingKilometer'] ?? " ";
        $this->fixedShippingCost = $settings['fixedShippingCost'] ?? " ";
        $this->deliveryFreeKilometer = $settings['deliveryFreeKilometer'] ?? " ";
        $this->percentageDeliver = $settings['percentageDeliver'] ?? " ";
        $this->percentageSales = $settings['percentageSales'] ?? " ";
        $this->shippingType = $settings['shippingType'] ?? "kilometer";//||area

    }


    public function render()
    {
        return view('livewire.dashboard.setting.general')->extends('layouts.app');
    }
}
