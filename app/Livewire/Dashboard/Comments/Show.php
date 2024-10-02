<?php

namespace App\Livewire\Dashboard\Comments;

use App\Repositories\Category\CategoryRepository;
use App\Repositories\Comment\CommentRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;

    #[Validate('required')]
    public $text;
    public $commentId;
    public $comment;

    public function getData()
    {
        $this->comment = app(CommentRepository::class)->find(['comment_id' => $this->commentId]);
        if ($this->comment == null) {
            session()->flash('notification', 'نظری یافت نشد');
            $this->redirectRoute('admin.comments.index');
        }
    }


    public function answer()
    {
        $this->validate();
        $data = [
            'parent_id' => $this->commentId,
            'text' => $this->text
        ];
        $comment = app(CommentRepository::class)->store($data);
        if ($comment != null) {
            session()->flash('notification', $comment);
            $this->redirectRoute('admin.comments.index');
        } else
            $this->dispatch('notification', message: __('messages.error request'));
    }

    public function mount($id)
    {
        $this->commentId = $id;
        $this->getData();
    }

    public function refreshData()
    {
        $this->render();
    }

    public function render()
    {
        return view('livewire.dashboard.comments.show')->extends('layouts.app');
    }
}
