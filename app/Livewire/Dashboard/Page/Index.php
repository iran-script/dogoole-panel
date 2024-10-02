<?php

namespace App\Livewire\Dashboard\Page;

use App\Repositories\Page\PageRepository;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Features\SupportLazyLoading\Page;

class Index extends Component
{
    public function getData()
    {
        $pages = app(PageRepository::class)->get();
        if ($pages == null)
            $this->dispatch('notification', message: __('messages.error response'));
        return $pages;
    }


    public function refreshData()
    {
        $this->render();
    }

    #[On('destroy')]
    public function destroy($id)
    {
        $check = app(PageRepository::class)->destroy(['page_id' => $id]);
        if ($check != null) {
            session()->flash('notification', $check);
            $this->redirectRoute('admin.page.index');
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
        return view('livewire.dashboard.page.index', [
            'pages' => $data,
        ])->extends('layouts.app');
    }
}
