<?php

namespace App\Livewire\Dashboard\BankAccount;

use App\Repositories\BankAccount\BankAccountRepository;
use App\Repositories\Category\CategoryRepository;
use App\Traits\GuzzleTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    use GuzzleTrait;

    #[Validate('required')]
    public $title;
    #[Validate('required')]
    public $bankName;
    #[Validate('required')]
    public $accountHolderName;
    #[Validate('required')]
    public $accountNumber;
    #[Validate('required|ir_bank_card_number')]
    public $cardNumber;
    #[Validate('required')]
    public $shabaNumber;
    #[Validate('nullable|numeric')]
    public $productId;


    public function setChange()
    {
        $this->validate();
        $data = [
            'title' => $this->title,
            'bank_name' => $this->bankName,
            'account_holder_name' => $this->accountHolderName,
            'account_number' => $this->accountNumber,
            'card_number' => $this->cardNumber,
            'shaba_number' => $this->shabaNumber,
        ];
        $slider = app(BankAccountRepository::class)->store($data);
        if ($slider != null) {
            session()->flash('notification', $slider);
            $this->redirectRoute('admin.bankAccount.index');
        } else
            $this->dispatch('notification', message: __('messages.error request'));
    }

    public function render()
    {
        return view('livewire.dashboard.bank-account.create')->extends('layouts.app');
    }
}
