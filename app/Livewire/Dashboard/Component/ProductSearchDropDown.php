<?php

namespace App\Livewire\Dashboard\Component;

use App\Repositories\Product\ProductRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;

class ProductSearchDropDown extends Component
{
    public $search;
    public $var;
    public $selected;
    public $page = 1;

    public function getData()
    {
        $productRepository = app(ProductRepository::class);
        $products = $productRepository->get(['search' => $this->search, 'page' => $this->page ?? 1]);
        if ($products != null) {
            return new LengthAwarePaginator($products['data'], $products['total'], $products['per_page'], $products['current_page']) ?? new LengthAwarePaginator([], 1, 1, 1);
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
        $products = $this->getData();
        return view('livewire.dashboard.component.product-search-drop-down', [
            'products' => $products
        ]);
    }
}
