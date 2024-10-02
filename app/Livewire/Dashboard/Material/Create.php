<?php

namespace App\Livewire\Dashboard\Material;

use App\Repositories\Category\CategoryRepository;
use App\Repositories\Material\MaterialRepository;
use App\Repositories\Unit\UnitRepository;
use App\Traits\GuzzleTrait;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use GuzzleTrait;
    use WithFileUploads;

    public $categories = [];
    public $units = [];
    #[Validate('required|numeric')]
    public $category_id = 0;
    #[Validate('required|numeric')]
    public $unit_id;


    public $material;
    public $material_id;

    #[Validate('required|image|max:2048')]
    public $image;

    #[Validate('required')]
    public $title;

    #[Validate('required|numeric')]
    public $pricePerUnit;

    #[Validate('required|numeric')]
    public $caloriePerUnit;

    #[Validate('required|numeric')]
    public $fatPerUnit;

    #[Validate('required|numeric')]
    public $proteinPerUnit;

    #[Validate('required|numeric')]
    public $carbohydratePerUnit;

    public function mount()
    {
        $this->categories = app(CategoryRepository::class)->get();
        if ($this->categories == null)
            $this->dispatch('notification', message: __('messages.error response category'));

        $this->units = app(UnitRepository::class)->get();
        if ($this->units == null)
            $this->dispatch('notification', message: __('messages.error response unit'));
    }

    public function setChange()
    {

        $this->validate();

        $data = [
            'title' => $this->title,
            'unit_id' => $this->unit_id,
            'price_per_unit' => $this->pricePerUnit,
            'calorie_per_unit' => $this->caloriePerUnit,
            'carbohydrate_per_unit' => $this->carbohydratePerUnit,
            'protein_per_unit' => $this->proteinPerUnit,
            'fat_per_unit' => $this->fatPerUnit
        ];

        if ($this->category_id != 0)
            $data['category_id'] = $this->category_id;

        $path = $this->upload($this->image) ?? "";
        $data['image'] = $path;


        $material = app(MaterialRepository::class)->store($data);

        if ($material != null) {
            session()->flash('notification', $material);
            $this->redirectRoute('admin.material.index');
        } else
            $this->dispatch('notification', message: __('messages.error request'));
    }

    public function render()
    {
        return view('livewire.dashboard.material.create')->extends('layouts.app');
    }
}
