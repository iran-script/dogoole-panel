<?php

namespace App\Livewire\Dashboard\ExtraType;

use App\Repositories\ExtraType\ExtraTypeRepository;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Create extends Component
{
    #[Validate('required')]
    public $title;

    public function setChange()
    {

        $this->validate();
        $data = [
            'title' => $this->title
        ];
        $material = app(ExtraTypeRepository::class)->store($data);
        if ($material != null) {
            session()->flash('notification', $material);
            $this->redirectRoute('admin.extraType.index');
        } else
            $this->dispatch('notification', message: __('messages.error request'));
    }

    public function render()
    {
        return view('livewire.dashboard.extra-type.create')->extends('layouts.app');
    }
}
