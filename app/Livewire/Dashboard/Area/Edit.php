<?php

namespace App\Livewire\Dashboard\Area;

use App\Repositories\Area\AreaRepository;
use App\Traits\GuzzleTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Edit extends Component
{
    use GuzzleTrait;

    #[Validate('required|numeric')]
    public $areaId = 0;

    #[Validate('required')]
    public $title;
    #[Validate('required|string')]
    public $areaSlug;
    #[Validate('required')]
    public $areaLat;
    #[Validate('required')]
    public $areaLang;



    public function mount($id)
    {
        $this->areaId = $id;
        $this->getArea($id);

    }

    public function getArea($id)
    {
        $area = app(AreaRepository::class)->find(['area_id' => $id]);
        if ($area == null) {
            session()->flash('notification', __('messages.problem get data'));
            $this->redirectRoute('admin.area.index');
        }
        $this->title = $area['title'];
        $this->areaId = $area['id'];
        $this->areaSlug = $area['slug'];
        $this->areaLat = $area['lat'];
        $this->areaLang = $area['lng'];
    }


    public function setChange()
    {
        $this->validate();
        $data = [
            'title' => $this->title,
            'area_id' => $this->areaId,
            'slug' => $this->areaSlug,
            "lat" => $this->areaLat,
            "lng" => $this->areaLang,
        ];
        $area = app(AreaRepository::class)->update($data);
        if ($area != null) {
            session()->flash('notification', $area);
            $this->redirectRoute('admin.area.index',0);
        } else
            $this->dispatch('notification', message: __('messages.error request'));
    }

    public function render()
    {
        return view('livewire.dashboard.area.edit')->extends('layouts.app');
    }
}
