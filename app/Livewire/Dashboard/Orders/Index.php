<?php

namespace App\Livewire\Dashboard\Orders;

use App\Repositories\Orders\OrderRepository;
use App\Repositories\PreparationTimeRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    #[Url]
    public $userId;
    public $user;
    #[Url]
    public $branchId;
    #[Url]
    public $driverId;
    #[Url]
    public $paymentStatus;
    #[Url]
    public $orderStatus;
    public $search;
    public $startDate;
    public $endDate;
    public $countAll = 0;
    public $sumPriceAll = 0;
    public $sumDelivery = 0;
    public $sumTax = 0;
    public $sumDiscount = 0;

    public $page = 1;
    public $export = false;
    public $times=[];

    public function getData()
    {
        $data = ['page' => $this->page];
        if ($this->userId and $this->userId != "null") $data['user_id'] = $this->userId;
        if ($this->branchId and $this->branchId != "null") $data['branch_id'] = $this->branchId;
        if ($this->driverId and $this->driverId != "null") $data['driver_id'] = $this->driverId;
        if ($this->paymentStatus) $data['payment_status'] = $this->paymentStatus;
        if ($this->orderStatus) $data['order_status'] = $this->orderStatus;
        if ($this->startDate) $data['start_date'] = $this->startDate;
        if ($this->endDate) $data['end_date'] = $this->endDate;
        if ($this->export) $data['export'] = $this->export;

        $this->user = json_decode(session('user'), true);
        if ($this->user['role_id'] == 3) {
            $data['branch_id'] = $this->user['target_role_id'];
        }
        if (!isset($data['order_status']) and $this->user['role_id'] == 5) {
            $data['driver_id'] = $this->user['id'];
        }
        $orderListRepo = app(OrderRepository::class)->get($data);

        if ($orderListRepo != null) {
            $this->countAll = $orderListRepo['countAll'] ?? 0;
            $this->sumPriceAll = $orderListRepo['sumPriceAll'] ?? 0;
            $this->sumDelivery = $orderListRepo['sumDelivery'] ?? 0;
            $this->sumTax = $orderListRepo['sumTax'] ?? 0;
            $this->sumDiscount = $orderListRepo['sumDiscount'] ?? 0;

            return new LengthAwarePaginator($orderListRepo['data']['data'], $orderListRepo['data']['total'], $orderListRepo['data']['per_page'], $orderListRepo['data']['current_page']) ?? [];
        } else {
            $this->dispatch('notification', message: __('messages.error request'));
            return new LengthAwarePaginator([], 1, 1, 1) ?? [];
        }


    }

    public function mount()
    {
        $times = app(PreparationTimeRepository::class)->get();
        if ($times['status'] == 200) {
            $this->times = $times['data'];
        } else
            $this->dispatch('notification', message: __('messages.get times failed'));
    }

    public function refreshData($export = false)
    {
        if ($export) {
            $this->export = true;
            $this->getData();
            $this->redirectRoute('admin.listExport.index');
        }
        $this->render();

        $this->export = false;
    }

    public function updatingPage($page)
    {
        $this->page = $page;
    }

    public function render()
    {
        $data = $this->getData();
        return view('livewire.dashboard.orders.index', [
            'orders' => $data
        ])->extends('layouts.app');
    }
}
