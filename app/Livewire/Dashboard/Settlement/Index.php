<?php

namespace App\Livewire\Dashboard\Settlement;


use App\Repositories\Settlement\SettlementRepository;
use Illuminate\Pagination\LengthAwarePaginator;

use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{


    use WithPagination;
    public $search;
    public $page=1;

    public $branch_id=" ";
    public function getData()
    {
        $settlement = app(SettlementRepository::class)->get(['search' => $this->search,'page'=>$this->page,'branch_id'=>$this->branch_id]);
        if ($settlement != null) {
            return new LengthAwarePaginator($settlement['data'], $settlement['total'], $settlement['per_page'], $settlement['current_page']) ?? new LengthAwarePaginator([], 1, 1, 1);
        } else {
            $this->dispatch('notification', message: __('messages.error request'));
            return new LengthAwarePaginator([], 1, 1, 1);
        }
    }

    public function refreshData()
    {
        $this->render();
    }


    #[On('changeStatus')]
    public function changeStatus($id)
    {
        $check = app(SettlementRepository::class)->update(['settlement_id' => $id,"status"=>"success"]);
        if ($check != null) {
            $this->dispatch('notification', message:  $check ??  __('messages.error request'));
        } else
            $this->dispatch('notification', message:  $check['message'] ??  __('messages.error request'));
    }
    public function updatingPage($page)
    {
        $this->page=$page;
    }

    public function render()
    {
        $data = $this->getData();
        return view('livewire.dashboard.settlement.index', [
            'settlements' => $data,
        ])->extends('layouts.app');
    }
}
