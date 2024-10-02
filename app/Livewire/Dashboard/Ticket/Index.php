<?php

namespace App\Livewire\Dashboard\Ticket;

use App\Repositories\Ticket\TicketRepository;
use App\Traits\GuzzleTrait;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use GuzzleTrait;

    #[Url]
    public $search = "";
    #[Url]
    public $page = 1;
    public $categories = [];
    #[Url]
    public $category_id = 1;

    public $status = "waiting_answer";

    public function mount()
    {
        $this->categories = app(TicketRepository::class)->getCategory();
        if ($this->categories == null)
            $this->dispatch('notification', message: __('messages.error response category'));
    }

    public function getData()
    {
        $ticketRepository = app(TicketRepository::class);
        $tickets = $ticketRepository->get(['category_id' => $this->category_id, 'status' => $this->status, 'page' => $this->page]);
        if ($tickets != null) {
            return new LengthAwarePaginator($tickets['data'], $tickets['total'], $tickets['per_page'], $tickets['current_page']) ?? new LengthAwarePaginator([], 1, 1, 1);
        } else {
            $this->dispatch('notification', message: __('messages.error request'));
            return new LengthAwarePaginator([], 1, 1, 1);
        }
    }


    public function setStatus($status)
    {
        $this->status = $status;
        $this->refreshData();
    }

    public function setCategory($id)
    {
        $this->category_id = $id;
        $this->refreshData();
    }

    public function refreshData()
    {
        $this->render();
    }
    public function updatingPage($page)
    {
        $this->page=$page;
    }

    public function render()
    {
        $data = $this->getData();
        return view('livewire.dashboard.ticket.index', [
            'tickets' => $data
        ])->extends('layouts.app');
    }
}
