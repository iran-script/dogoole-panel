<?php

namespace App\Livewire\Dashboard\User\Client;

use App\Repositories\User\UserRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;


    public $search;
    public $roleId;

    #[Url]
    public $page = 1;


    public $export = false;

    public function updatingPage($page)
    {
        $this->page=$page;
    }

    public function getData()
    {
        $data = ['search' => $this->search, 'page' => $this->page];
        if ($this->export) $data['export'] = $this->export;
        if ($this->roleId and $this->roleId != "null") $data['role_id'] = $this->roleId;
        $clients = app(UserRepository::class)->get($data);
        if ($clients != null) {
            return new LengthAwarePaginator($clients['data'], $clients['total'], $clients['per_page'], $clients['current_page']) ?? new LengthAwarePaginator([], 1, 1, 1);
        } else {
            $this->dispatch('notification', message: __('messages.error request'));
            return new LengthAwarePaginator([], 1, 1, 1);
        }
    }

    public function refreshData($export = false)
    {
        if ($export) {
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
        $check = app(UserRepository::class)->destroy(['user_id' => $id]);
        if ($check != null) {
            session()->flash('notification', $check);
            $this->redirectRoute('admin.user.client.index');
        } else
            $this->dispatch('notification', message: __('messages.error request'));
    }

    public function render()
    {
        $data = $this->getData();
        return view('livewire.dashboard.user.client.index', [
            'clients' => $data,
        ])->extends('layouts.app');
    }
}
