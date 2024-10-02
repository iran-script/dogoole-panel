<?php

namespace App\Livewire\Dashboard\Branch;

use App\Repositories\Area\AreaRepository;
use App\Repositories\Branch\BranchRepository;
use App\Repositories\DeliveryType\DeliveryTypeRepository;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class DeliveryAreas extends Component
{

    public $areas = '';
    public $branchId;
    public $areaIdSelected;
    public $areaLevel2Selected;

    public $areasLevel2;

    public $areasSelected = [];


    public function addArea()
    {


        if ($this->areaLevel2Selected != null and $this->areaLevel2Selected != "null") {
            $beforeArray = $this->searchArray($this->areasSelected, 'id', (int)$this->areaLevel2Selected);
            if ($beforeArray != null) {
                $this->dispatch('notification', message: __('قبلا انتخاب شده است'));
                return;
            }
            $area = $this->searchArray($this->areasLevel2, 'id', $this->areaLevel2Selected);
            $this->areasSelected[] = [
                'id' => (int)$this->areaLevel2Selected,
                'title' => $area['title'],
                'shipment_price' => 0
            ];
        } else if ($this->areaIdSelected != null and $this->areaIdSelected != "null") {
            $beforeArray = $this->searchArray($this->areasSelected, 'id', (int)$this->areaIdSelected);
            if ($beforeArray != null) {
                $this->dispatch('notification', message: __('قبلا انتخاب شده است'));
                return;
            }

            $area = $this->searchArray($this->areas, 'id', $this->areaIdSelected);
            $this->areasSelected[] = [
                'id' => (int)$this->areaIdSelected,
                'title' => $area['title'],
                'shipment_price' => 0
            ];
        } else
            $this->dispatch('notification', message: __('هیچ منطقه ای انتخاب نشده است'));

    }

    function searchArray($array, $key, $value)
    {
        foreach ($array as $record) {
            if (isset($record[$key]) && $record[$key] == $value) {
                return $record;
            }
        }
        return null;
    }

    public function changeArea($id)
    {

        $this->areaLevel2Selected = null;
        $child = $this->getArea($id);
        if ($child == null)
            $this->areasLevel2 = null;
        else
            $this->areasLevel2 = $child;
    }

    public function getArea($parentId = 0)
    {
        return app(AreaRepository::class)->get(['parent_id' => $parentId]);
    }


    public function mount($branch_id = null)
    {
        if ($branch_id == null)
            $this->branchId = session('target_role_id');
        else
            $this->branchId = $branch_id;
        $this->areas = $this->getArea();
        $areasSelected = app(BranchRepository::class)->shipmentAreas(['branch_id' => $branch_id]);
        if ($areasSelected != null) {
            $this->areasSelected = $areasSelected;
        }
    }

    public function setChange()
    {
        $data = [
            "branch_id" => $this->branchId,
            "areas" => $this->areasSelected
        ];
        $area = app(BranchRepository::class)->setOrUpdateAreaDelivery($data);
        if ($area != null) {
            session()->flash('notification', $area);
            $this->redirectRoute('admin.branch.deliveryAreas', $this->branchId);
        } else
            $this->dispatch('notification', message: __('messages.error request'));
    }

    #[On('destroy')]
    public function destroy($id)
    {
        $check = app(BranchRepository::class)->detachDeliveryArea(['area_id' => $id, 'branch_id' => $this->branchId]);
        if ($check != null) {
            session()->flash('notification', $check);
            $this->redirectRoute('admin.branch.deliveryAreas', $this->branchId);
        } else
            $this->dispatch('notification', message: __('messages.error request'));
    }

    public function render()
    {
        return view('livewire.dashboard.branch.delivery-area')->extends('layouts.app');
    }
}
