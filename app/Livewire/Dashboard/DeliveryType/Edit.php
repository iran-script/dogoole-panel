<?php

namespace App\Livewire\Dashboard\DeliveryType;

use App\Repositories\DeliveryType\DeliveryTypeRepository;
use App\Traits\GuzzleTrait;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Edit extends Component
{
    use GuzzleTrait;

    public $deliveryId;

    #[Validate('required')]
    public $title;

    #[Validate('required|boolean')]
    public $isCost;
    #[Validate('required|boolean')]
    public $isAddress;

    #[Validate('required|boolean')]
    public $descriptionRequired;

    #[Validate('required_if:descriptionRequired,1')]
    public $descriptionText;

    #[Validate('required_if:descriptionRequired,1')]
    public $descriptionErrorText;

    #[Validate('required|boolean')]
    public $isActive;

    #[Validate('required')]
    public $message;


    public function mount($id)
    {
        $this->deliveryId = $id;
        $this->getData($id);

    }

    public function getData($id)
    {
        $deliveryType = app(DeliveryTypeRepository::class)->find(['delivery_type_id' => $id]);
        if ($deliveryType == null) {
            session()->flash('notification', __('messages.problem get data'));
            $this->redirectRoute('admin.deliveryType.index');
        }
        $this->title = $deliveryType['title'];
        $this->isCost = ($deliveryType['is_cost'] == true) ? 1 : 0;
        $this->isAddress = ($deliveryType['is_address'] == true) ? 1 : 0;
        $this->descriptionText = $deliveryType['description_text'];
        $this->descriptionRequired = ($deliveryType['description_required'] == true) ? 1 : 0;
        $this->descriptionErrorText = $deliveryType['description_error_text'];
        $this->isActive = ($deliveryType['is_active'] == true) ? 1 : 0;
        $this->message = $deliveryType['message'];

    }

    public function setChange()
    {
        $this->validate();
        $data = [
            'title' => $this->title,
            'is_cost' => $this->isCost,
            'is_address' => $this->isAddress,
            'message' => $this->message,
            'description_text' => $this->descriptionText,
            "description_required" => $this->descriptionRequired,
            "description_error_text" => $this->descriptionErrorText,
            "is_active" => $this->isActive,
            "delivery_type_id" => $this->deliveryId,
        ];
        $deliveryType = app(DeliveryTypeRepository::class)->update($data);
        if ($deliveryType != null) {
            session()->flash('notification', $deliveryType);
            $this->redirectRoute('admin.deliveryType.index');
        } else
            $this->dispatch('notification', message: __('messages.error request'));
    }

    public function render()
    {
        return view('livewire.dashboard.delivery-type.edit')->extends('layouts.app');
    }
}
