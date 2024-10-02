<?php

namespace App\Livewire\Dashboard\Category;

use App\Repositories\Category\CategoryRepository;
use App\Traits\GuzzleTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    use GuzzleTrait;

    #[Validate('required|numeric')]
    public $categoryId = 0;
    #[Validate('nullable|image')]
    public $image;
    public $beforeImage;
    #[Validate('required')]
    public $title;


    public function mount($id)
    {
        $this->categoryId = $id;
        $this->getCategory($id);
    }

    public function getCategory($id)
    {
        $extra = app(CategoryRepository::class)->find(['id' => $id]);
        if ($extra == null) {
            session()->flash('notification', __('messages.problem get data'));
            $this->redirectRoute('admin.extraType.index');
        }
        $this->title = $extra['title'];
        $this->beforeImage = $extra['img'];
    }

    public function setChange()
    {
        $this->validate();
        $data = [
            'title' => $this->title,
            'category_id' => $this->categoryId
        ];
        if ($this->image) {
            $path = $this->upload($this->image) ?? "";
            $data['img'] = $path;
        }
        $category = app(CategoryRepository::class)->update($data);
        if ($category != null) {
            session()->flash('notification', $category);
            $this->redirectRoute('admin.category.index', 0);
        } else
            $this->dispatch('notification', message: __('messages.error request'));
    }

    public function render()
    {
        return view('livewire.dashboard.category.edit')->extends('layouts.app');
    }
}
