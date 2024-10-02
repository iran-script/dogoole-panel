<?php

namespace App\Livewire\Dashboard\ListExport;


use App\Repositories\ExportImport\ExportImportRepository;
use Illuminate\Pagination\LengthAwarePaginator;

use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $page = 1;

    public function getData()
    {
        $data = ['page' => $this->page];
        $files = app(ExportImportRepository::class)->get($data);
        if ($files != null) {
            return new LengthAwarePaginator($files['data'], $files['total'], $files['per_page'], $files['current_page']) ?? new LengthAwarePaginator([], 1, 1, 1);
        } else {
            $this->dispatch('notification', message: __('messages . error request'));
            return new LengthAwarePaginator([], 1, 1, 1);
        }
    }
    public function updatingPage($page)
    {
        $this->page=$page;
    }

    public function render()
    {
        $data = $this->getData();
        return view('livewire.dashboard.list-export.index', [
            'files' => $data,
        ])->extends('layouts.app');
    }
}
