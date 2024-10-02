<?php

namespace App\Livewire\Dashboard\Area;

use App\Repositories\Area\AreaRepository;
use App\Traits\GuzzleTrait;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    use GuzzleTrait;

    #[Validate('required|numeric')]
    public $parentId = 0;


    #[Validate('required')]
    public $title;
    #[Validate('required|string')]
    public $areaSlug;
    #[Validate('required')]
    public $areaLat;
    #[Validate('required')]
    public $areaLang;

    public function setChange()
    {
        $this->validate();
        $data = [
            'title' => $this->title,
            'parent_id' => $this->parentId,
            'slug' => $this->areaSlug,
            "lat" => $this->areaLat,
            "lng" => $this->areaLang,
        ];
        $area = app(AreaRepository::class)->store($data);
        if ($area != null) {
            session()->flash('notification', $area);
            $this->redirectRoute('admin.area.index', $this->parentId);
        } else
            $this->dispatch('notification', message: __('messages.error request'));
    }

    public function render()
    {
        return view('livewire.dashboard.area.create')->extends('layouts.app');
    }
}
