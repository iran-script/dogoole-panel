<?php

namespace App\Livewire\Dashboard\ExtraType;

use App\Repositories\ExtraType\ExtraTypeRepository;
use App\Traits\GuzzleTrait;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Edit extends Component
{
    use GuzzleTrait;


    public $material;
    public $extra_type_id;
    #[Validate('required')]
    public $title;

    public function mount($id)
    {
        $this->getExtraType($id);
        $this->extra_type_id = $id;
    }


    public function getExtraType($id)
    {
        $extraType = app(ExtraTypeRepository::class)->find(['extra_type_id' => $id]);
        if ($extraType == null) {
            session()->flash('notification', __('messages.problem get data'));
            $this->redirectRoute('admin.extraType.index');
        }
        $this->title = $extraType['title'];
    }

    public function setChange()
    {
        $this->validate();

        $data = [
            'title' => $this->title,
            'extra_type_id' => $this->extra_type_id,
        ];

        $material = app(ExtraTypeRepository::class)->update($data);

        if ($material != null) {
            session()->flash('notification', $material);
            $this->redirectRoute('admin.extraType.index');
        } else
            $this->dispatch('notification', message: __('messages.error request'));
    }

    public function render()
    {
        return view('livewire.dashboard.extra-type.edit')->extends('layouts.app');
    }
}
