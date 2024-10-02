<?php

namespace App\Livewire\Dashboard\Component;

use App\Repositories\Branch\BranchRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;

class BranchSearchDropDown extends Component
{
    public $search;
    public $var;
    public $selected;
    public $page = 1;

    public function getData()
    {
        $branchRepository = app(BranchRepository::class);
        $branches = $branchRepository->get(['search' => $this->search, 'page' => $this->page ?? 1]);

        if ($branches != null and $branches['status'] == 200) {
            $branches = $branches['data'];
            return new LengthAwarePaginator($branches['data'], $branches['total'], $branches['per_page'], $branches['current_page']) ?? new LengthAwarePaginator([], 1, 1, 1);
        } else {
            $this->dispatch('notification', message: __('messages.error request'));
            return new LengthAwarePaginator([], 1, 1, 1);
        }
    }


    public function refreshData()
    {
        $this->render();
    }

    public function render()
    {
        $branches = $this->getData();
        return view('livewire.dashboard.component.branch-search-drop-down', [
            'branches' => $branches
        ]);
    }
}
