<?php

namespace App\Livewire\Dashboard\Sliders;

use App\Repositories\Slider\SliderRepository;
use App\Traits\GuzzleTrait;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    use GuzzleTrait;

    #[Validate('required|image')]
    public $image;

    #[Validate('required')]
    public $title;
    #[Validate('required')]
    public $type;

    #[Validate('required|url')]
    public $link;

    #[Validate('nullable|numeric')]
    public $productId;

    public function setChange()
    {
        $this->validate();
        $data = [
            'title' => $this->title,
            'product_id' => $this->productId ?? null,
            'type' => $this->type,
            'link' => $this->link
        ];
        $path = $this->upload($this->image) ?? "";
        $data['image'] = $path;
        $slider = app(SliderRepository::class)->store($data);
        if ($slider['status'] == 200) {
            session()->flash('notification', __('index.operation successfully'));
            $this->redirectRoute('admin.sliders.index');
        } elseif ($slider['status'] == 400)
            $this->dispatch('notification', message: $slider['message']);
        else
            $this->dispatch('notification', message: __('messages.error request'));
    }
    public function render()
    {
        return view('livewire.dashboard.slider.create')->extends('layouts.app');
    }
}
