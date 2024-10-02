<?php

namespace App\Livewire\Dashboard\BankAccount;

use App\Repositories\BankAccount\BankAccountRepository;
use App\Traits\GuzzleTrait;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
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


    public $bankAccount;
    public $bankAccountId;

    public function mount($id)
    {
        $this->bankAccountId = $id;
        $this->getBankAccountId($id);
    }

    public function getBankAccountId($id)
    {
        $bankAccount = app(BankAccountRepository::class)->find(['bank_account_id' => $id]);
        if ($bankAccount == null) {
            session()->flash('notification', __('messages.problem get data'));
            $this->redirectRoute('admin.extraType.index');
        }
        $this->title = $bankAccount['title'];
        $this->bankName = $bankAccount['bank_name'];
        $this->accountHolderName = $bankAccount['account_holder_name'];
        $this->accountNumber = $bankAccount['account_number'];
        $this->cardNumber = $bankAccount['card_number'];
        $this->shabaNumber = $bankAccount['shaba_number'];

    }

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
            'bank_account_id' => $this->bankAccountId
        ];
        $slider = app(BankAccountRepository::class)->update($data);
        if ($slider != null) {
            session()->flash('notification', $slider);
            $this->redirectRoute('admin.bankAccount.index');
        } else
            $this->dispatch('notification', message: __('messages.error request'));
    }


    public function render()
    {
        return view('livewire.dashboard.bank-account.edit')->extends('layouts.app');
    }
}
