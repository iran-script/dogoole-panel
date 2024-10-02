<?php

namespace App\Livewire\Dashboard\Component;

use App\Models\User;
use App\Repositories\User\UserRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use function Symfony\Component\String\u;

class DriverSearchDropDown extends Component
{
    public $search;
    public $var;
    public $selected;
    public $page = 1;

    public function getData()
    {
        $clients = app(UserRepository::class)->get(['search' => $this->search,'role_id' => 5, 'page' => $this->page]);
        if ($clients != null) {
            return new LengthAwarePaginator($clients['data'], $clients['total'], $clients['per_page'], $clients['current_page']) ?? new LengthAwarePaginator([], 1, 1, 1);
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

        $users = $this->getData();
        return view('livewire.dashboard.component.driver-search-drop-down', [
            'users' => $users
        ]);
    }
}
