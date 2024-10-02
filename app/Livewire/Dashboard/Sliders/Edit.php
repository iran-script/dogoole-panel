<?php

namespace App\Livewire\Dashboard\Sliders;

use App\Repositories\Category\CategoryRepository;
use App\Repositories\Slider\SliderRepository;
use App\Traits\GuzzleTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    use GuzzleTrait;


    #[Validate('nullable|image')]
    public $image;

    public $beforeImage;
    #[Validate('required')]
    public $title;
    #[Validate('required')]
    public $type;

    #[Validate('nullable|numeric')]
    public $productId;
    #[Validate('required')]
    public $sliderId;
    #[Validate('required|url')]
    public $link;

    public function mount($id)
    {
        $this->sliderId = $id;
        $this->getSlider($id);
    }

    public function getSlider($id)
    {
        $extra = app(SliderRepository::class)->find(['slider_id' => $id]);
        if ($extra == null) {
            session()->flash('notification', __('messages.problem get data'));
            $this->redirectRoute('admin.extraType.index');
        }
        $this->title = $extra['title'];
        $this->productId = $extra['product_id'];
        $this->beforeImage = $extra['image'];
        $this->type = $extra['type'];
        $this->link = $extra['link'];
    }

    public function setChange()
    {
        $this->validate();
        $data = [
            'title' => $this->title,
            'slider_id' => $this->sliderId,
            'product_id' => null,
            'type' => $this->type,
            'link' => $this->link,
        ];
        if ($this->image) {
            $path = $this->upload($this->image) ?? "";
            $data['image'] = $path;
        }
        $slider = app(SliderRepository::class)->update($data);
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
        return view('livewire.dashboard.slider.edit')->extends('layouts.app');
    }
}
