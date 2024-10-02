<?php

namespace App\Livewire\Dashboard\Ticket;

use App\Repositories\Ticket\TicketRepository;
use App\Traits\GuzzleTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Reply extends Component
{
    use GuzzleTrait;
    use WithFileUploads;

    public $id;
    public $subject;
    public $category_id;
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


    public function mount($id)
    {
        $this->getTicket($id);
    }

    public function getTicket($id)
    {
        $ticket = app(TicketRepository::class)->ticket(['ticket_id' => $id]);
        if ($ticket == null) {
            session()->flash('notification', __('messages.problem get data'));
            $this->redirectRoute('admin.ticket.index');
        }
        $this->tickets = $ticket;
    }

    public function setChange()
    {
        $this->validate();
        $data = [
            'subject' => $this->subject,
            'text' => $this->text,
            'parent_id' => $this->id
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
        return view('livewire.dashboard.ticket.reply')->extends('layouts.app');
    }
}
