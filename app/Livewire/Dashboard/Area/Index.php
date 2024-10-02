<?php

namespace App\Livewire\Dashboard\Area;

use App\Repositories\Area\AreaRepository;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{

    public $parentId = 0;
    public $search;


    public function getData()
    {
        $areas = app(AreaRepository::class)->get(['parent_id' => $this->parentId,'search'=>$this->search]);
        if ($areas == null)
            $this->dispatch('notification', message: __('messages.error response area'));
        return $areas;
    }


    public function refreshData()
    {
        $this->render();
    }

    #[On('destroy')]
    public function destroy($id)
    {
        $check = app(AreaRepository::class)->destroy(['area_id' => $id]);
        if ($check != null) {
            session()->flash('notification', $check);
            $this->redirectRoute('admin.area.index',$this->parentId);
        } else
            $this->dispatch('notification', message: __('messages.error request'));
    }


    public function render()
    {
        $data = $this->getData();
        return view('livewire.dashboard.area.index', [
            'areas' => $data,
        ])->extends('layouts.app');
    }
}
