<?php
namespace App\Livewire\Dashboard\Extra;
use App\Repositories\Extra\ExtraRepository;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Edit extends Component
{

    public $extraId;

    #[Validate('required')]
    public $title;


    #[Validate('required|numeric')]
    public $price;


    #[Validate('nullable|string')]
    public $description;

    public function mount($id)
    {
        $this->getExtraType($id);
        $this->extraId = $id;
    }


    public function getExtraType($id)
    {
        $extra = app(ExtraRepository::class)->find(['extra_id' => $id]);
        if ($extra == null) {
            session()->flash('notification', __('messages.problem get data'));
            $this->redirectRoute('admin.extraType.index');
        }
        $this->title = $extra['title'];
        $this->price = $extra['price'];
        $this->description = $extra['description'];
    }

    public function setChange()
    {
        $this->validate();

        $data = [
            'title' => $this->title,
            'extra_id' => $this->extraId,
            'price' => $this->price,
            'description' => $this->description
        ];

        $material = app(ExtraRepository::class)->update($data);

        if ($material != null) {
            session()->flash('notification', $material);
            $this->redirectRoute('admin.extraType.index');
        } else
            $this->dispatch('notification', message: __('messages.error request'));
    }

    public function render()
    {
        return view('livewire.dashboard.extra.edit')->extends('layouts.app');
    }
}
