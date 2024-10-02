<?php

namespace App\Livewire\Dashboard\Discount;

use App\Repositories\Branch\BranchRepository;
use App\Repositories\Discount\DiscountRepository;
use App\Traits\GuzzleTrait;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;


class Index extends Component
{
    use GuzzleTrait;

    #[Url]
    public $search = "";

    public $page = 1;

    public function refreshData()
    {
        $this->render();
    }

    public function getData()
    {
        $discountRepository = app(DiscountRepository::class);
        $data = ['search' => $this->search, 'page' => $this->page ?? 1];
        $discounts = $discountRepository->get($data);
        if ($discounts != null) {
            return new LengthAwarePaginator($discounts['data'], $discounts['total'], $discounts['per_page'], $discounts['current_page']) ?? new LengthAwarePaginator([], 1, 1, 1);
        } else {
            $this->dispatch('notification', message: __('messages.error request'));
            return new LengthAwarePaginator([], 1, 1, 1);
        }
    }

    #[On('destroy')]
    public function destroy($id)
    {
        $check = app(DiscountRepository::class)->destroy(['coupon_id' => $id]);
        if ($check != null) {
            session()->flash('notification', $check);
            $this->redirectRoute('admin.discount.index');
        } else
            $this->dispatch('notification', message: __('messages.error request'));
    }

    public function render()
    {
        $data = $this->getData();
        return view('livewire.dashboard.discount.index', [
            'discounts' => $data
        ])->extends('layouts.app');
    }
}
