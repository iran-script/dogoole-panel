<?php

namespace App\Livewire\Dashboard\ExtraType;

use App\Repositories\Category\CategoryRepository;
use App\Repositories\ExtraType\ExtraTypeRepository;
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
    public $search = "";

    #[Url]
    public $page = 1;

    public function getData()
    {
        $extraTypeRep = app(ExtraTypeRepository::class)->get(['search' => $this->search]);
        if ($extraTypeRep!=null) {
            return new LengthAwarePaginator($extraTypeRep['data'], $extraTypeRep['total'], $extraTypeRep['per_page'], $extraTypeRep['current_page']) ?? [];
        } else {
            $this->dispatch('notification', message: __('messages.error request'));
            return new LengthAwarePaginator([],1, 1, 1) ?? [];
        }
    }
    public function refreshData()
    {
        $this->render();
    }
    public function updatingPage($page)
    {
        $this->page=$page;
    }

    #[On('destroy')]
    public function destroy($id)
    {
        $check = app(ExtraTypeRepository::class)->destroy(['extra_type_id' => $id]);
        if ($check != null) {
            session()->flash('notification', $check);
            $this->redirectRoute('admin.extraType.index');
        } else
            $this->dispatch('notification', message: __('messages.error request'));
    }

    public function render()
    {
        $data = $this->getData();
        return view('livewire.dashboard.extra-type.index', [
            'extraTypes' => $data
        ])->extends('layouts.app');
    }
}
