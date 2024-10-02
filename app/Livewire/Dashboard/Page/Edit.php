<?php

namespace App\Livewire\Dashboard\Page;

use App\Repositories\Page\PageRepository;
use App\Traits\GuzzleTrait;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    use GuzzleTrait;


    #[Validate('required')]
    public $title;
    #[Validate('required')]
    public $text;

    #[Validate('nullable')]
    public $slug;
    #[Validate('required')]
    public $pageId;

    #[Validate('nullable|image')]
    public $cover = null;
    public $beforeCover = "";


    public function mount($id)
    {
        $this->pageId = $id;
        $this->getpage($id);
    }

    public function getpage($id)
    {
        $page = app(PageRepository::class)->find(['page_id' => $id]);
        if ($page == null) {
            session()->flash('notification', __('messages.problem get data'));
            $this->redirectRoute('admin.extraType.index');
        }
        $this->title = $page['title'];
        $this->text = $page['text'];
        $this->slug = $page['slug'];
        $this->beforeCover = $page['cover'];
    }

    public function setChange()
    {
        $this->validate();


        $data = [
            'title' => $this->title,
            'page_id' => $this->pageId,
            'text' => $this->text,
            'slug' => $this->slug,
            'cover' => ($this->cover !== null) ? $this->upload($this->cover) : $this->beforeCover,

        ];
        $page = app(PageRepository::class)->update($data);
        if ($page != null) {
            session()->flash('notification', $page);
            $this->redirectRoute('admin.page.index');
        } else
            $this->dispatch('notification', message: __('messages.error request'));
    }

    public function render()
    {
        return view('livewire.dashboard.page.edit')->extends('layouts.app');
    }
}
