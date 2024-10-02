<?php

namespace App\Livewire\Dashboard\Settlement;


use App\Repositories\Settlement\SettlementRepository;
use Illuminate\Pagination\LengthAwarePaginator;

use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class WalletBranches extends Component
{


    use WithPagination;

    public $search;
    public $page = 1;


    public function getData()
    {
        $settlement = app(SettlementRepository::class)->getWallet(['search' => $this->search, 'page' => $this->page]);

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


    #[On('saveSettlement')]
    public function saveSettlement($userId, $amount, $description)
    {
        $data = [
            "user_id" => $userId,
            "amount" => $amount * -1,
            "description" => $description,
            "transaction_type" => 'bank_deposit',
        ];
        $request = app(SettlementRepository::class)->store($data);
        if ($request != null) {
            session()->flash('notification', $request);
            $this->redirectRoute('admin.settlement.WalletBranches');
        } else
            $this->dispatch('notification', message: __('messages.error request'));
    }

    public function render()
    {
        $data = $this->getData();
        return view('livewire.dashboard.settlement.wallet-branches', [
            'settlements' => $data,
        ])->extends('layouts.app');
    }
}
