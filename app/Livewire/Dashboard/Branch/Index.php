<?php

namespace App\Livewire\Dashboard\Branch;

use App\Repositories\Branch\BranchRepository;
use App\Traits\GuzzleTrait;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;


class Index extends Component
{
    use WithPagination;
    use GuzzleTrait;

    #[Url]
    public $search = "";

    public $page = 1;
    public $export = false;

    public function updatingPage($page)
    {
        $this->page = $page;
    }

    public function getData()
    {
        $branchRepository = app(BranchRepository::class);
        $data = ['search' => $this->search, 'page' => $this->page ?? 1];
        if ($this->export) $data['export'] = $this->export;
        $branches = $branchRepository->get($data);
        if ($branches != null and $branches['status'] == 200) {
            $branches = $branches['data'];
            return new LengthAwarePaginator($branches['data'], $branches['total'], $branches['per_page'], $branches['current_page']) ?? new LengthAwarePaginator([], 1, 1, 1);
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

        $this->export = false;
    }


    #[On('destroy')]
    public function destroy($id)
    {
        $check = app(BranchRepository::class)->destroy(['branch_id' => $id]);
        if ($check != null) {
            session()->flash('notification', $check);
            $this->redirectRoute('admin.material.index');
        } else
            $this->dispatch('notification', message: __('messages.error request'));
    }

    public function render()
    {
        $data = $this->getData();
        return view('livewire.dashboard.branch.index', [
            'branches' => $data
        ])->extends('layouts.app');
    }
}
