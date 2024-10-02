<?php

namespace App\Livewire\Dashboard\Product;

use App\Repositories\Category\CategoryRepository;
use App\Repositories\Material\MaterialRepository;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Setting\SettingRepository;
use App\Traits\GuzzleTrait;
use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    use GuzzleTrait;

    #[Validate('required|string')]
    public $title;
    public $varietyId;
    #[Validate('required|string|max:300')]
    public $minDescription;
    #[Validate('required')]
    public $description;

    #[Validate('nullable|image')]
    public $image;

    public $beforeImage;

    #[Validate('nullable|image')]
    public $image_1;
    public $beforeImage1;
    #[Validate('nullable|image')]
    public $image_2;
    public $beforeImage2;

    #[Validate('nullable|image')]
    public $image_3;
    public $beforeImage3;

    #[Validate('nullable|image')]
    public $image_4;
    public $beforeImage4;


    #[Validate('required|numeric')]
    public $product_id;
    public $priceMatrial;
    public $foodProfit = 0;
    public $materials = [];
    public $useMaterial;
    public $materialIndex;
    public $materialsUsed = [];


    public $menuBranchList = [];
    #[Validate('required')]
    public $menuSelected;
    #[Url]
    public $productStatus = ['active', 'disable', 'awaiting_approval'];
    public $status;
    public $isVariety;

    #[Validate([
        'varieties' => 'required',
        'varieties.*.title' => [
            'required_if:isVariety,yes',
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
    ], [
        'varieties.*.title.required_if' => 'فیلد :attribute الزامی است است.',
    ], [
        'varieties.*.title' => 'عنوان تنوع',
    ])]
    public $varieties;

    public function mount($id)
    {
        $this->product_id = $id;
        $product = app(ProductRepository::class)->find(['product_id' => (int)$id]);
        if ($product == null)
            $this->redirectRoute('admin.product.index');

        $this->title = $product['title'];
        $this->description = $product['description'];
        $this->beforeImage = $product['image'];
        $this->minDescription = $product['min_description'] ?? " ";
        $this->menuSelected = $product['menu_id'];


        if (!isset($product['varieties']) || empty($product['varieties'])) {
            $this->varieties = [
                [
                    'id' => null,
                    'title' => null,
                    'price' => null,
                    'price_paking' => 0,
                    'count' => 100,
                    'discount' => 0,
                    'max_order' => 10,
                ]
            ];
            $this->isVariety = "no";
        } else
            $this->setVarieties($product['varieties']);

        $this->varietyId = $product['variety']['id'] ?? 0;
        $this->status = $product['status'];


        if ($product['images'] != null)
            foreach ($product['images'] as $key => $file) {
                $k = $key + 1;
                $k = "beforeImage" . $k;
                $this->$k = $file['path'];
            }
        $m = [];
        foreach ($product['material'] as $item) {
            $m[] = ['id' => $item['id'], 'price' => $item['price_per_unit'],
                'title' => $item['title'],
                'used' => $item['pivot']['usage_per_unit']];
        }
        $this->materialsUsed = $m;

        $this->menuBranchList = app(CategoryRepository::class)->get(['branch_id' => $product['branch_id']]);
        if (empty($this->menuBranchList)) {
            session()->flash('notification', __('index.first you need to define the menu'));
            $this->redirectRoute('admin.category.create', 0);
        }

        $settings = app(SettingRepository::class)->get(["names" => ["foodProfit"]]);
        if ($settings == null)
            $this->dispatch('notification', message: __('messages.error response'));

        $this->foodProfit = $settings['foodProfit'] ?? " ";
    }


    public function setVarieties($varieties)
    {
        if (count($varieties) > 1)
            $this->isVariety = "yes";
        else
            $this->isVariety = "no";
        foreach ($varieties as $item) {
            $this->varieties[] = [
                'id' => $item['id'],
                'title' => $item['title'],
                'price' => $item['price'],
                'price_paking' => $item['price_paking'],
                'count' => $item['count'],
                'discount' => $item['discount'],
                'max_order' => $item['max_order'],
            ];
        }
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

    public function addVariety()
    {

        $this->varieties[] = [
            'id' => null,
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

    public function setChange()
    {
//        $this->calculatePrice();
//        if ($this->materialsUsed == null or count($this->materialsUsed) == 0) {
//            $this->dispatch('notification2', message: __('messages.you required select material'));
//            return;
//        }
//        if ($this->price > $this->priceMatrial) {
//            $this->dispatch('notification2', message: __('messages.max price materials used'));
//            return;
//        }
        $this->validate();


        $dataSaveProduct = [
            'title' => $this->title,
            'description' => $this->description,
            'min_description' => $this->minDescription ?? null,
            'product_id' => $this->product_id,
            'menu_id' => $this->menuSelected,
            'status' => $this->status,
        ];

        if ($this->image) {
            $path = $this->upload($this->image) ?? "";
            $dataSaveProduct['image'] = $path;
        }

        $product = app(ProductRepository::class)->update($dataSaveProduct);

        if ($product['status'] == 200) {
            if ($this->isVariety != "yes") {
                $this->varieties[0]['title'] = $this->title;
            }
            $variaty = app(ProductRepository::class)->updateOrStoreVarieties(['varieties' => $this->varieties], $this->product_id);

//            $setMaterials = app(ProductRepository::class)->setMaterials(['product_id' => $this->product_id, 'materials' => $this->materialsUsed]);
            $dataGallery = $this->saveGalleryAndReturnArray();
            if (count($dataGallery) > 0)
                $setGallery = app(ProductRepository::class)->setGallery(['product_id' => $this->product_id, 'images' => $dataGallery]);
            session()->flash('notification', __("index.operation successful"));
            $this->redirectRoute('admin.product.index');
        } elseif ($product['status'] == 400)
            $this->dispatch('notification', message: $product['message']);
        else
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
        return view('livewire.dashboard.product.edit')->extends('layouts.app');
    }
}
