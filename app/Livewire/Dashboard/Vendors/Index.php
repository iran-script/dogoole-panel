<?php
namespace App\Livewire\Dashboard\Vendors;

use App\Repositories\Vendor\VendorRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
class Index extends Component
{
    use WithPagination;
    public $search;
    public $page=1;

    public $name;
    public $family;
    public $mobile;
    public $nationalCode;
    public $birthday;
    public $referralCode;
    public $userName;
    public $address;
    public $tel;
    public $socials = [];

    public function mount()
    {
    }

    public function getData()
    {
        $vendorRepository = app(VendorRepository::class);
        $vendors = $vendorRepository->getRegister(['page' => $this->page ?? 1]);
        if ($vendors != null) {
            return new LengthAwarePaginator($vendors['data'], $vendors['total'], $vendors['per_page'], $vendors['current_page']) ?? new LengthAwarePaginator([], 1, 1, 1);
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
        $data = $this->getData();
        return view('livewire.dashboard.vendors.index', [
            'vendors' => $data,
        ])->extends('layouts.app');
    }
}
