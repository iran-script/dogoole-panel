<?php

namespace App\Livewire\Dashboard\Transaction;

use App\Repositories\Product\ProductRepository;
use App\Repositories\Transaction\TransactionRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search;

    #[Url]
    public $user_id;

    public $page = 1;


    public $count = 0;
    public $allProfitSales = 0;
    public $allProfitDelivery = 0;
    public $allPriceOrder = 0;
    public $allPriceDelivery = 0;
    public $sumWallet = 0;
    public $transactionType;

    public $startDate;

    public $endDate;
    #[Url]
    public $userId;

    public $sumSalesProfit;
    public $sumDeliveryProfit;
    public $allPriceBankDeposit;

    public $export = false;

    public function getData()
    {

        $data = ['page' => $this->page];
        if ($this->userId and $this->userId != "null") $data['user_id'] = $this->userId;
        if ($this->transactionType and $this->transactionType != "null") $data['transaction_type'] = $this->transactionType;
        if ($this->startDate) $data['start_date'] = $this->startDate;
        if ($this->endDate) $data['end_date'] = $this->endDate;
        if ($this->export) $data['export'] = $this->export;
        $transactions = app(TransactionRepository::class)->get($data);
        if ($transactions != null) {
            $this->count = $transactions['count'] ?? 0;
            $this->allProfitSales = $transactions['allProfitSales'] ?? 0;
            $this->allProfitDelivery = $transactions['allProfitDelivery'] ?? 0;
            $this->allPriceOrder = $transactions['allPriceOrder'] ?? 0;
            $this->allPriceDelivery = $transactions['allPriceDelivery'] ?? 0;
            $this->sumWallet = $transactions['sumWallet'] ?? 0;
            $this->allPriceBankDeposit = $transactions['allPriceBankDeposit'] * -1 ?? 0;

            return new LengthAwarePaginator($transactions['data']['data'], $transactions['data']['total'], $transactions['data']['per_page'], $transactions['data']['current_page']) ?? new LengthAwarePaginator([], 1, 1, 1);
        } else {
            $this->dispatch('notification', message: __('messages . error request'));
            return new LengthAwarePaginator([], 1, 1, 1);
        }
    }

    public function refreshData($export=false)
    {
        if ($export){
            $this->export = true;
            $this->getData();
            $this->redirectRoute('admin.listExport.index');
        }
        $this->render();

        $this->export = false;

    }

    public function updatingPage($page)
    {
        $this->page=$page;
    }

    public function render()
    {
        $data = $this->getData();
        return view('livewire.dashboard.transaction.index', [
            'transactions' => $data,
        ])->extends('layouts.app');
    }
}
