<?php

namespace App\Livewire\Dashboard\Sliders;

use App\Repositories\Slider\SliderRepository;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{



    public function getData()
    {
        $slider = app(SliderRepository::class)->get(['branch_id' => 0]);

        if ($slider == null)
            $this->dispatch('notification', message: __('messages.error response category'));
        return $slider;
    }


    public function refreshData()
    {
        $this->render();
    }

    #[On('destroy')]
    public function destroy($id)
    {
        $check = app(SliderRepository::class)->destroy(['slider_id' => $id]);
        if ($check != null) {
            session()->flash('notification', $check);
            $this->redirectRoute('admin.sliders.index');
        } else
            $this->dispatch('notification', message: __('messages.error request'));
    }

    public function updatingPage($page)
    {
        $this->page=$page;
    }

    public function render()
    {
        $data = $this->getData();
        return view('livewire.dashboard.slider.index', [
            'sliders' => $data,
        ])->extends('layouts.app');
    }
}
