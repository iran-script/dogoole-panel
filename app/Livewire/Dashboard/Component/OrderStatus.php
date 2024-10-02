<?php

namespace App\Livewire\Dashboard\Component;

use App\Repositories\Orders\OrderRepository;
use App\Repositories\PreparationTimeRepository;
use Livewire\Attributes\On;
use Livewire\Component;

class OrderStatus extends Component
{
    public $user;
    public $orderPrice;
    public $orderStatus;
    public $orderId;
    public $times = [];
    public $timeSelected = 10;
    public $statusAfter;

    public function mount()
    {
        $this->user = json_decode(session('user'), true);
        if ($this->user['role_id'] == 1 || $this->user['role_id'] == 6) {
            $this->statusAfter = [
//                'ordering' => 'wating_payment',
//                'wating_payment' => 'awaiting_restaurant_approval',
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

    #[On('saveReturned')]
    public function saveReturned($amount, $description, $whoseAccount)
    {
        $data = [
            "order_id" => $this->orderId,
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

    #[On('acceptOrder.{orderId}',)]
    public function acceptOrder($minute)
    {
        $data = [
            "order_id" => $this->orderId,
            "preparation_time" => $minute,
        ];
        $request = app(OrderRepository::class)->accept($data);
        if ($request['status'] == 200) {
            session()->flash('notification', __('message.successfully'));
            $this->redirectRoute('admin.orders.index');
        } else
            $this->dispatch('notification', message: __('messages.error accept order'));
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

    public function render()
    {
        return view('livewire.dashboard.component.order-status');
    }
}
