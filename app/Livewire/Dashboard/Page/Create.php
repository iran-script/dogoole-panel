<?php

namespace App\Livewire\Dashboard\Page;

use App\Repositories\Page\PageRepository;
use App\Traits\GuzzleTrait;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    use GuzzleTrait;


    #[Validate('required')]
    public $title;
    #[Validate('required')]
    public $text;
    #[Validate('nullable')]
    public $slug;
    #[Validate('required|image')]
    public $cover = "";
    public function setChange()
    {
        $this->validate();
        $data = [
            'title' => $this->title,
            'text' => $this->text,
            'slug' => $this->slug,
            'cover' => ($this->cover !== null) ? $this->upload($this->cover) : null,
        ];
        $page = app(PageRepository::class)->store($data);
        if ($page != null) {
            session()->flash('notification', $page);
            $this->redirectRoute('admin.page.index');
        } else
            $this->dispatch('notification', message: __('messages.error request'));
    }

    public function render()
    {
        return view('livewire.dashboard.page.create')->extends('layouts.app');
    }
}
