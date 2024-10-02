<?php

namespace App\Livewire\Dashboard\Product;

use App\Repositories\Category\CategoryRepository;
use App\Repositories\Material\MaterialRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Setting\SettingRepository;
use App\Traits\GuzzleTrait;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    use GuzzleTrait;

    #[Validate('required|string')]
    public $title;
    public $varietyId;
    #[Validate('required|string|max:300')]
    public $minDescription;
    #[Validate('required|string')]
    public $description;


    #[Validate('required|image')]
    public $image;
    #[Validate('nullable|image')]
    public $image_1;
    #[Validate('nullable|image')]
    public $image_2;
    #[Validate('nullable|image')]
    public $image_3;
    #[Validate('nullable|image')]
    public $image_4;


    public $isVariety;

    #[Validate([
        'varieties' => 'required',
        'varieties.*.title' => [
            'required_if:isVariety,yes',
           // 'min:3',
        ],
        'varieties.*.price' => [
            'required',
            'numeric',
        ],
        'varieties.*.price_paking' => [
            'required',
            'numeric',
        ],
        'varieties.*.discount' => [
            'required',
            'numeric',
            'max:100',
            'min:0'
        ],
        'varieties.*.count' => [
            'required',
            'numeric',
            'max:100',
            'min:0'
        ],
        'varieties.*.max_order' => [
            'required',
            'numeric',
            'min:1'
        ],
    ])]
    public $varieties = [
        [
            'title' => null,
            'price' => null,
            'price_paking' => 0,
            'count' => 100,
            'discount' => 0,
            'max_order' => 10,
        ]
    ];

    public $materials = [];
    public $useMaterial;

    public $foodProfit;
    public $priceMatrial;
    public $materialIndex;
    public $materialsUsed = [];

    public $menuBranchList = [];
    #[Validate('required')]
    public $menuSelected;

    public $productStatus = ['active', 'disable', 'awaiting_approval'];
    public $status='active';

    public function mount()
    {
        $settings = app(SettingRepository::class)->get(["names" => ["foodProfit"]]);
        if ($settings == null)
            if ($settings == null)
                $this->dispatch('notification', message: __('messages.error response'));


        if (session('role_id') == 3 || session('role_id') == 6) {
            $this->menuBranchList = app(CategoryRepository::class)->get(['branch_id' => session('target_role_id')]);

            if (empty($this->menuBranchList)) {
                session()->flash('notification', __('index.first you need to define the menu'));
                $this->redirectRoute('admin.category.create', 0);
            }

        }
        $this->foodProfit = $settings['foodProfit'] ?? " ";

    }

    public function addVariety()
    {

        $this->varieties[] = [
            'title' => null,
            'price' => null,
            'price_paking' => 0,
            'count' => 100,
            'discount' => 0,
            'max_order' => 10,
        ];
    }

    public function removeVariety($key)
    {
        if (count($this->varieties) > 1) {
            unset($this->varieties[$key]);
            $this->varieties = array_values($this->varieties);
            $this->dispatch('notification', message: __('messages.price removed successfully'));
        } else
            $this->dispatch('notification', message: __('messages.a price is mandatory'));
    }

    public function getMaterialCategory($id)
    {
        $materialRepository = app(MaterialRepository::class);
        $materials = $materialRepository->getAll(['category_id' => $this->category_level_1_selected]);
        if ($materials != null) {
            $this->materials = $materials;
        } else {
            $this->dispatch('notification', message: __('messages.error request'));
            return [];
        }
    }


    public function setChange()
    {

//        if ($this->materialsUsed == null or count($this->materialsUsed) == 0) {
//            $this->dispatch('notification2', message: __('messages.you required select material'));
//            return;
//        }
//
//
//        if ($this->price > $this->priceMatrial) {
//            $this->dispatch('notification2', message: __('messages.max price materials used'));
//            return;
//        }
        $this->validate();
        $dataSaveProduct = [
            'title' => $this->title,
            'description' => $this->description,
            'menu_id' => $this->menuSelected ?? 0,
            'min_description' => $this->minDescription ?? null
        ];
        $path = $this->upload($this->image) ?? "";
        $dataSaveProduct['image'] = $path;
        $product = app(ProductRepository::class)->store($dataSaveProduct);
        if ($product != null) {
            if ($this->isVariety != "yes") {
                $this->varieties[0]['title'] = $this->title;
            }

            $variaty = app(ProductRepository::class)->updateOrStoreVarieties(['varieties' => $this->varieties], $product['id']);

//            $setMaterials = app(ProductRepository::class)->setMaterials(['product_id' => $product['id'], 'materials' => $this->materialsUsed]);


            $dataGallery = $this->saveGalleryAndReturnArray();
            if (count($dataGallery) > 0)
                $setGallery = app(ProductRepository::class)->setGallery(['product_id' => $product['id'], 'images' => $dataGallery]);

            session()->flash('notification', __('index.operation successful'));
            $this->redirectRoute('admin.product.index');
        } else
            $this->dispatch('notification', message: __('messages.error request'));
    }

    public function saveGalleryAndReturnArray()
    {
        $data = [];

        if ($this->image_1 != null)
            $data[] = $this->upload($this->image_1);

        if ($this->image_2 != null)
            $data[] = $this->upload($this->image_2);

        if ($this->image_3 != null)
            $data[] = $this->upload($this->image_3);

        if ($this->image_4 != null)
            $data[] = $this->upload($this->image_4);
        return $data;
    }


    public function addMaterialUsed()
    {
        if ($this->materialIndex == null or $this->materialIndex == " ") {
            $this->dispatch('notification', message: __('messages.you required select material'));
            return;
        }

        if ($this->useMaterial == null or $this->useMaterial == " ") {
            $this->dispatch('notification', message: __('messages.you required select use material'));
            return;
        }
        $this->materialsUsed[$this->materialIndex] = ['id' => $this->materials[$this->materialIndex]['id'],
            'title' => $this->materials[$this->materialIndex]['title'],
            'price' => $this->materials[$this->materialIndex]['price_per_unit'],
            'used' => $this->useMaterial];
        $this->materialIndex = null;
        $this->useMaterial = null;
        $this->calculatePrice();
    }


    protected function calculatePrice()
    {
        $materials = $this->materialsUsed;
        $price = 0;
        foreach ($materials as $material) {
            $price += $material['price'] * $material['used'];
        }
        $this->priceMatrial = (($this->foodProfit / 100) * $price) + $price;

    }


    public function removeMaterialUsed($index)
    {
        unset($this->materialsUsed[$index]);
        $this->calculatePrice();

    }

    public function render()
    {
        return view('livewire.dashboard.product.create')->extends('layouts.app');
    }
}
