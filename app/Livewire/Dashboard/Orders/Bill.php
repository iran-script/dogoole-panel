<?php

namespace App\Livewire\Dashboard\Orders;

use App\Repositories\Orders\OrderRepository;
use App\Repositories\Settlement\SettlementRepository;
use App\Traits\GuzzleTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Bill extends Component
{
    use GuzzleTrait;

    public $orderId;
    public $paymentType;
    public $createdTime;
    public $paymentStatus;
    public $orderStatus;
    public $orderDeliveryTime;
    public $orderPrice;
    public $orderCodeGateway;
    public $orderTaxPrice;
    public $orderdiscountPrice;
    public $DeliveryPrice;
    public $userName;
    public $userMobile;
    public $userFamily;
    public $userEmail;
    public $userTel;
    public $addressUnit;
    public $addressTitle;
    public $addressPlaque;
    public $addressFull;
    public $addressPostalCode;
    public $orderCarts;
    public $user;


    public $statusAfter;
    public $description;

    public function mount($id)
    {
        $this->user = json_decode(session('user'), true);

        $this->orderId = $id;
        $this->getorder($id);
        if ($this->user['role_id'] == 1) {
            $this->statusAfter = [
                'ordering' => 'wating_payment',
                'wating_payment' => 'awaiting_restaurant_approval',
                'awaiting_restaurant_approval' => 'preparing',
                'preparing' => 'ready_to_send',
                'ready_to_send' => 'sending',
                'sending' => 'delivered',
            ];
        } elseif ($this->user['role_id'] == 3) {
            $this->statusAfter = [
                'awaiting_restaurant_approval' => 'preparing',
            ];
        } elseif ($this->user['role_id'] == 5) {
            $this->statusAfter = [
                'ready_to_send' => 'sending',
                'sending' => 'delivered',

            ];
        }
    }


    public function getOrder($id)
    {

        $order = app(OrderRepository::class)->find(['order_id' => $id]);
        if ($order == null) {
            session()->flash('notification', __('messages.problem get data'));
            $this->redirectRoute('admin.orders.index');
        }
        $this->paymentType = $order['payment_type'];
        $this->createdTime = $order['created_at'];
        $this->description = $order['description']??' ';
        $this->paymentStatus = $order['payment_status'];
        $this->orderStatus = $order['order_status'];
        $this->orderDeliveryTime = $order['delivery_time'];
        $this->orderPrice = $order['order_price'];
        $this->orderCodeGateway = $order['payment_code_gateway'];
        $this->orderdiscountPrice = $order['discount_price'];
        $this->DeliveryPrice = $order['delivery_price'];
        $this->userName = $order['user']['name'];
        $this->userMobile = $order['user']['mobile'];
        $this->userFamily = $order['user']['family'];
        $this->orderTaxPrice = $order['tax_price'];
        $this->userEmail = $order['user']['email'];
        $this->userTel = $order['user']['tel'];
        $jsonString = $order['address'];
        $addressArray = json_decode($jsonString, true);
        $this->addressUnit = $addressArray['unit'] ?? null;
        $this->addressTitle = $addressArray['title'] ?? null;
        $this->addressPlaque = $addressArray['plaque'] ?? null;
        $this->addressFull = $addressArray['address'] ?? null;
        $this->addressPostalCode = $addressArray['postal_code'] ?? null;
        $this->orderCarts = json_decode($order['carts'], true) ?? [];

        if ($this->user['role_id'] == 3) {
            $data['branch_id'] = $this->user['target_role_id'];
        }
        if ($this->user['role_id'] == 5) {
            $data['driver_id'] = $this->user['id'];
        }
    }


    public function changeStatus()
    {
        if (isset($this->statusAfter[$this->orderStatus])) {
            $order = app(OrderRepository::class)->changeStatus(["order_id" => $this->orderId, "status" => $this->statusAfter[$this->orderStatus]]);
            if ($order != null) {
                session()->flash('notification', __('messages.successfuly'));
                $this->redirectRoute('admin.orders.index');
            } else {
                $this->dispatch('notification', message: __('messages.error request'));
            }

        }
    }
    public function getOrderForSend()
    {
        if (isset($this->statusAfter[$this->orderStatus])) {
            $order = app(OrderRepository::class)->getOrderForSend(["order_id" => $this->orderId]);
            if ($order != null) {
                session()->flash('notification', $order);
                $this->redirectRoute('admin.orders.index');
            } else {
                $this->dispatch('notification', message: __('messages.error request'));
            }

        }
    }


    #[On('saveReturned')]
    public function saveReturned($orderId, $amount, $description, $whoseAccount)
    {
        $data = [
            "order_id" => $orderId,
            "amount" => $amount * -1,
            "description" => $description,
            "whoseAccount" => $whoseAccount,
        ];
        $request = app(OrderRepository::class)->returned($data);
        if ($request != null) {
            session()->flash('notification', $request);
            $this->redirectRoute('admin.settlement.WalletBranches');
        } else
            $this->dispatch('notification', message: __('messages.error request'));
    }


    public function render()
    {
        return view('livewire.dashboard.orders.bill')->extends('layouts.bill');
    }
}
