<?php

namespace App\Livewire\Dashboard\Extra;

use App\Repositories\Extra\ExtraRepository;
use App\Repositories\ExtraType\ExtraTypeRepository;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Create extends Component
{

    #[Validate('required|numeric')]
    public $extraTypeId;

    #[Validate('required')]
    public $title;


    #[Validate('required|numeric')]
    public $price;


    #[Validate('nullable|string')]
    public $description;


    public function mount($extraTypeId){
        $this->extraTypeId=$extraTypeId;
    }


    public function setChange()
    {
        $this->validate();
        $data = [
            'title' => $this->title,
            'price' => $this->price,
            'description' => $this->description,
            'extra_type_id' => $this->extraTypeId,
        ];
        $material = app(ExtraRepository::class)->store($data);
        if ($material != null) {
            session()->flash('notification', $material);
            $this->redirectRoute('admin.extra.index',$this->extraTypeId);
        } else
            $this->dispatch('notification', message: __('messages.error request'));
    }

    public function render()
    {
        return view('livewire.dashboard.extra.create')->extends('layouts.app');
    }
}
