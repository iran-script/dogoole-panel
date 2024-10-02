<?php

namespace App\Livewire\Dashboard\DeliveryType;

use App\Repositories\DeliveryType\DeliveryTypeRepository;
use App\Traits\GuzzleTrait;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Create extends Component
{
    use GuzzleTrait;

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
        ];
        $area = app(DeliveryTypeRepository::class)->store($data);
        if ($area != null) {
            session()->flash('notification', $area);
            $this->redirectRoute('admin.deliveryType.index');
        } else
            $this->dispatch('notification', message: __('messages.error request'));
    }

    public function render()
    {
        return view('livewire.dashboard.delivery-type.create')->extends('layouts.app');
    }
}
