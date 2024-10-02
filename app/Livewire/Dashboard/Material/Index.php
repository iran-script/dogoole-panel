<?php

namespace App\Livewire\Dashboard\Material;

use App\Repositories\Category\CategoryRepository;
use App\Repositories\Material\MaterialRepository;
use App\Traits\GuzzleTrait;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use GuzzleTrait;

    #[Url]
    public $search;

    #[Url]
    public $page = 1;

    public $categories = [];
    #[Url]
    public $category_id = 0;

    public $export = false;
    public function mount()
    {
        $this->categories = app(CategoryRepository::class)->get();
        if ($this->categories == null)
            $this->dispatch('notification', message: __('messages.error response category'));
    }

    public function getData()
    {
        $materialRepository = app(MaterialRepository::class);
        $data = ['search' => $this->search, 'page' => $this->page ?? 1];
        if ($this->export) $data['export'] = $this->export;
        if ($this->category_id != 0) $data['category_id'] = $this->category_id;
        $materials = $materialRepository->get($data);
        if ($materials != null) {
            return new LengthAwarePaginator($materials['data'], $materials['total'], $materials['per_page'], $materials['current_page']) ?? new LengthAwarePaginator([], 1, 1, 1);
        } else {
            $this->dispatch('notification', message: __('messages.error request'));
            return new LengthAwarePaginator([], 1, 1, 1);
        }
    }
    public function updatingPage($page)
    {
        $this->page=$page;
    }

    public function refreshData($export = false)
    {
        if ($export)
        {
            $this->export = true;
            $this->getData();
            $this->redirectRoute('admin.listExport.index');
        }
        $this->render();
        $this->export = false;
    }


    #[On('destroy')]
    public function destroy($id)
    {
        $check = app(MaterialRepository::class)->destroy(['material_id' => $id]);
        if ($check != null) {
            session()->flash('notification', $check);
            $this->redirectRoute('admin.material.index');
        } else
            $this->dispatch('notification', message: __('messages.error request'));
    }

    public function render()
    {
        $data = $this->getData();
        return view('livewire.dashboard.material.index', [
            'materials' => $data
        ])->extends('layouts.app');
    }
}
