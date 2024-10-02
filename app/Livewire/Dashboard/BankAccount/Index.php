<?php

namespace App\Livewire\Dashboard\BankAccount;

use App\Repositories\BankAccount\BankAccountRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{


    public $userId;

    public function getData()
    {
        if (session('role_id') == 1)
            $bankAccount = app(BankAccountRepository::class)->getAll(["user_id" => $this->userId]);
        else
            $bankAccount = app(BankAccountRepository::class)->getAllUser();

        if ($bankAccount != null) {
            return new LengthAwarePaginator($bankAccount['data'], $bankAccount['total'], $bankAccount['per_page'], $bankAccount['current_page']) ?? new LengthAwarePaginator([], 1, 1, 1);
        } else {
            $this->dispatch('notification', message: __('messages.error request'));
        }
    }


    public function refreshData()
    {
        $this->render();
    }

    #[On('destroy')]
    public function destroy($id)
    {
        $check = app(BankAccountRepository::class)->destroy(['bank_account_id' => $id]);
        if ($check != null) {
            session()->flash('notification', $check);
            $this->redirectRoute('admin.bankAccount.index');
        } else
            $this->dispatch('notification', message: __('messages.error request'));
    }

    public function render()
    {
        $data = $this->getData();
        return view('livewire.dashboard.bank-account.index', [
            'bankAccounts' => $data,
        ])->extends('layouts.app');
    }
}
