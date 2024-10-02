<?php

namespace App\Livewire\Dashboard\Comments;

use App\Repositories\Category\CategoryRepository;
use App\Repositories\Comment\CommentRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    #[Url]
    public $search = "";

    #[Url]
    public $page = 1;


    public $startDate;
    public $endDate;
    public $branchId;
    public function updatingPage($page)
    {
        $this->page=$page;
    }


    public function getData()
    {
        $data = ["page" => $this->page];
        $this->user = json_decode(session('user'), true);
        if ($this->user['role_id'] == 3) {
            $data['branch_id'] = $this->user['target_role_id'];
        }
        if ($this->startDate) $data['start_date'] = $this->startDate;
        if ($this->endDate) $data['end_date'] = $this->endDate;
        if ($this->branchId and $this->branchId != "null") $data['branch_id'] = $this->branchId;



        $comments = app(CommentRepository::class)->get($data);
        if ($comments != null) {
            return new LengthAwarePaginator($comments['data'], $comments['total'], $comments['per_page'], $comments['current_page']) ?? new LengthAwarePaginator([], 1, 1, 1);
        } else {
            $this->dispatch('notification', message: __('messages.error request'));
            return new LengthAwarePaginator([], 1, 1, 1);
        }
    }

    public function mount()
    {
    }


    public function refreshData()
    {
        $this->render();
    }


    public function render()
    {
        $data = $this->getData();
        return view('livewire.dashboard.comments.index', ['comments' => $data])->extends('layouts.app');
    }
}
