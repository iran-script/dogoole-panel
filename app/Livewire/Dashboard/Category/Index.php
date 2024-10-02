<?php

namespace App\Livewire\Dashboard\Category;

use App\Repositories\Category\CategoryRepository;
use App\Repositories\Extra\ExtraRepository;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{

    public $parentId = 0;
    public $search;


    public function getData()
    {
        $data = ['parent_id' => $this->parentId, 'search' => $this->search];
        if (session('role_id') == 3)
            $data['branch_id'] = session('target_role_id');
        return  app(CategoryRepository::class)->get($data);
    }

    public function refreshData()
    {
        $this->render();
    }

    #[On('destroy')]
    public function destroy($id)
    {
        $check = app(CategoryRepository::class)->destroy(['id' => $id]);
        if ($check != null) {
            session()->flash('notification', $check);
            $this->redirectRoute('admin.category.index', $this->parentId);
        } else
            $this->dispatch('notification', message: __('messages.error request'));
    }

    public function render()
    {
        $data = $this->getData();
        return view('livewire.dashboard.category.index', [
            'categories' => $data,
        ])->extends('layouts.app');
    }
}
