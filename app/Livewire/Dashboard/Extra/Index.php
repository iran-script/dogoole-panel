<?php

namespace App\Livewire\Dashboard\Extra;

use App\Repositories\Extra\ExtraRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    #[Url]
    public $search = "";

    #[Url]
    public $page = 1;


    public $extraTypeId;

    public function updatingPage($page)
    {
        $this->page=$page;
    }

    public function mount($extraTypeId)
    {
        $this->extraTypeId = $extraTypeId;

    }

    public function getData()
    {

        $extraTypeRep = app(ExtraRepository::class)->get(['search' => $this->search, 'extra_type_id' => $this->extraTypeId]);
        if ($extraTypeRep != null) {
            return new LengthAwarePaginator($extraTypeRep['data'], $extraTypeRep['total'], $extraTypeRep['per_page'], $extraTypeRep['current_page']) ?? [];
        } else {
            $this->dispatch('notification', message: __('messages.error request'));
            return new LengthAwarePaginator([], 1, 1, 1) ?? [];
        }
    }

    public function refreshData()
    {
        $this->render();
    }

    #[On('destroy')]
    public function destroy($id)
    {
        $check = app(ExtraRepository::class)->destroy(['extra_id' => $id]);
        if ($check != null) {
            session()->flash('notification', $check);
            $this->redirectRoute('admin.extra.index',$this->extraTypeId);
        } else
            $this->dispatch('notification', message: __('messages.error request'));
    }

    public function render()
    {
        $data = $this->getData();
        return view('livewire.dashboard.extra.index', [
            'extras' => $data
        ])->extends('layouts.app');
    }
}
