<?php

namespace App\Livewire\Dashboard\Product;

use App\Repositories\Category\CategoryRepository;
use App\Repositories\Extra\ExtraRepository;
use App\Repositories\Product\ProductRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{


    use WithPagination;

    public $search;
    public $page = 1;
    public $export = false;
    #[Url]
    public $productStatus;

    public function getData()
    {
        $data = ['search' => $this->search, 'page' => $this->page];
        if ($this->productStatus and $this->productStatus != 'null') $data['status'] = $this->productStatus;
        if ($this->export) $data['export'] = $this->export;
        $products = app(ProductRepository::class)->get($data);
        if ($products != null) {
            return new LengthAwarePaginator($products['data'], $products['total'], $products['per_page'], $products['current_page']) ?? new LengthAwarePaginator([], 1, 1, 1);
        } else {
            $this->dispatch('notification', message: __('messages.error request'));
            return new LengthAwarePaginator([], 1, 1, 1);
        }
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

    #[On('destroy')]
    public function destroy($id)
    {
        $check = app(ProductRepository::class)->destroy(['product_id' => $id]);
        if ($check != null) {
            session()->flash('notification', $check);
            $this->redirectRoute('admin.product.index');
        } else
            $this->dispatch('notification', message: __('messages.error request'));
    }

    public function updatingPage($page)
    {
        $this->page = $page;
    }

    public function updateVarietyCount($id, $count)
    {
        $data = [
            'count' => $count,
            'variety_id' => $id,
        ];
        $variety = app(ProductRepository::class)->updateCountVariety($data);
        if ($variety['status'] == 200) {
            session()->flash('notification', __('messages.success request'));
            $this->redirectRoute('admin.product.index');
        } else
            $this->dispatch('notification', message: __('messages.error request'));
    }

    public function render()
    {
        $data = $this->getData();
        return view('livewire.dashboard.product.index', [
            'products' => $data,
        ])->extends('layouts.app');
    }
}
