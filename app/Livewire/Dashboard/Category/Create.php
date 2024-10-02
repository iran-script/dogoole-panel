<?php

namespace App\Livewire\Dashboard\Category;

use App\Repositories\Category\CategoryRepository;
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


    #[Validate('required|image')]
    public $image = 0;


    #[Validate('required')]
    public $title;

    public function setChange()
    {
        $this->validate();
        $data = [
            'title' => $this->title,
            'parent_id' => $this->parentId
        ];
        $path = $this->upload($this->image) ?? "";
        $data['img'] = $path;
        $category = app(CategoryRepository::class)->store($data);
        if ($category != null) {
            session()->flash('notification', $category);
            $this->redirectRoute('admin.category.index', $this->parentId);
        } else
            $this->dispatch('notification', message: __('messages.error request'));
    }

    public function render()
    {
        return view('livewire.dashboard.category.create')->extends('layouts.app');
    }
}
