<?php

namespace App\Livewire\Dashboard\DeliveryType;

use App\Repositories\DeliveryType\DeliveryTypeRepository;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{

    public $search;


    public function getData()
    {
        $shipmentType = app(DeliveryTypeRepository::class)->get(['search' => $this->search]);
        if ($shipmentType == null)
            $this->dispatch('notification', message: __('messages.error response area'));
        return $shipmentType;
    }


    public function refreshData()
    {
        $this->render();
    }

    #[On('destroy')]
    public function destroy($id)
    {
        $check = app(DeliveryTypeRepository::class)->destroy(['delivery_type_id' => $id]);
        if ($check != null) {
            session()->flash('notification', $check);
            $this->redirectRoute('admin.deliveryType.index');
        } else
            $this->dispatch('notification', message: __('messages.error request'));
    }


    public function render()
    {
        $data = $this->getData();
        return view('livewire.dashboard.delivery-type.index', [
            'deliveryTypes' => $data,
        ])->extends('layouts.app');
    }
}
