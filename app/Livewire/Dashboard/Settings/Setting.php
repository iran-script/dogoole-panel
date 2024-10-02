<?php

namespace App\Livewire\Dashboard\Settings;

use App\Repositories\Category\CategoryRepository;
use App\Repositories\Extra\ExtraRepository;
use App\Repositories\Product\ProductRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Setting extends Component
{

    public function refreshData()
    {
        $this->render();
    }

    public function render()
    {
        return view('livewire.dashboard.settings.setting')->extends('layouts.app');
    }
}
