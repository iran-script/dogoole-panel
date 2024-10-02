<?php

namespace App\Livewire\Dashboard\Ticket;

use App\Repositories\Ticket\TicketRepository;
use App\Traits\GuzzleTrait;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;

class Create extends Component
{
    use GuzzleTrait;
    use WithFileUploads;

    public $id;
    #[Validate('required')]
    public $subject;
    public $category;
    #[Validate('nullable|mimes:jpeg,png,svg,pdf|max:512')]
    public $file;
    public $status;
    public $user;
    public $parent_id;
    public $created_at;
    public $tickets;
    #[Validate('required')]
    public $text;
    #[Validate('required')]
    public $categories = [];
    #[Validate('required')]
    public $category_id;

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

    public function setChange()
    {
        $this->validate();
        $data = [
            'subject' => $this->subject,
            'text' => $this->text,
            'parent_id' => $this->id,
            'category_id' => $this->category_id,
        ];
        if ($this->file) {
            $path = $this->upload($this->file);

            if ($path) {
                $data['file'] = $path;
            } else {
                session()->flash('error', __('messages.error file upload'));
                return;
            }
        }
        $material = app(TicketRepository::class)->store($data);
        if ($material != null) {
            session()->flash('notification', $material);
            $this->redirectRoute('admin.ticket.index');
        } else
            $this->dispatch('notification', message: __('messages.error request'));
    }

    public function render()
    {
        return view('livewire.dashboard.ticket.create')->extends('layouts.app');
    }
}
