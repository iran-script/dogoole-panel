<?php

namespace App\Livewire\Dashboard\Branch;

use App\Repositories\Branch\BranchRepository;
use App\Repositories\DeliveryType\DeliveryTypeRepository;
use App\Traits\GuzzleTrait;
use Livewire\Component;
use Livewire\WithPagination;

class DeliveryTypes extends Component
{
    use WithPagination;
    use GuzzleTrait;

    public $branchId;
    public $typesselected = [];

    public function mount($id = null)
    {
        if ($id == null)
            $id = session('target_role_id');
        $this->branchId = $id;
    }


    public function getData()
    {

        $shipmentType = app(DeliveryTypeRepository::class)->get();


        $this->typesselected = app(BranchRepository::class)->getOrUpdateDeliveryType($this->branchId)['data'] ?? [];

        if ($shipmentType == null)
            $this->dispatch('notification', message: __('messages.error response area'));
        return $shipmentType;
    }


    public function setChange()
    {
        $response = app(BranchRepository::class)->setOrUpdateDeliveryType($this->branchId, ['deliveryTypes' => array_values($this->typesselected)]);
        if ($response and $response['status'] == 200) {
            session()->flash('notification', __('index.operation successfully'));
            $this->redirectRoute('admin.branch.deliveryTypes');
        } elseif ($response and  $response['status'] == 400)
            $this->dispatch('notification', message: $response['message']);
        else
            $this->dispatch('notification', message: __('messages.error request'));
    }

    public function refreshData()
    {
        $this->render();
    }

    public function render()
    {
        $data = $this->getData();
        return view('livewire.dashboard.branch.delivery-type', [
            'shipmentTypes' => $data
        ])->extends('layouts.app');
    }
}
