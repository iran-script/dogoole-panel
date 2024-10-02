<?php

namespace App\Livewire\Dashboard\Settlement;

use App\Repositories\Category\CategoryRepository;
use App\Repositories\Material\MaterialRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Settlement\SettlementRepository;
use App\Traits\GuzzleTrait;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    use GuzzleTrait;


    public $user;
    #[Validate('required|integer'), Url]
    public $userId;

    #[Validate('required|integer')]
    public $amount;


    #[Validate('required')]
    public $description;

    public $maxWallet = 0;

    public function mount()
    {

        $this->user = json_decode(session('user'), true);
        if ($this->user['role_id'] != 1) {
            session()->flash('notification', 'شما دسترسی به این بخش ندارید');
            $this->redirectRoute('admin.settlement.index');
        }
    }



    public function setChange()
    {
        $this->validate();

        $data = [
            "user_id" => $this->userId,
            "amount" => $this->amount,
            "description" => $this->description,
        ];
        $request = app(SettlementRepository::class)->store($data);
        if ($request != null) {
            session()->flash('notification', $request);
            $this->redirectRoute('admin.transaction.index');
        } else
            $this->dispatch('notification', message: __('messages.error request'));
    }

    public function render()
    {
        return view('livewire.dashboard.settlement.create')->extends('layouts.app');
    }
}
