<?php

namespace App\Livewire\Dashboard\Branch;

use App\Repositories\Activity\ActivityRepository;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Activity extends Component
{
    use WithFileUploads;

    #[Url]
    public $search = "";

    public $branchId;


    public $weekDay = [
        'saturday' => 'شنبه',
        'sunday' => 'یکشنبه',
        'monday' => 'دوشنبه',
        'tuesday' => 'سه شنبه',
        'wednesday' => 'چهارشنبه',
        'thursday' => 'پنج شنبه',
        'friday' => 'جمعه',
    ];

    public $beforeActivity = [];

    #[Validate('required')]
    public $day = "";

    #[Validate('required')]
    public $from = "";

    #[Validate('required')]
    public $to = "";


    public function mount($id = null)
    {

        if ($id == null)
            $id = session('target_role_id');
        $this->branchId = $id;
        $activityRepository = app(ActivityRepository::class);
        $this->beforeActivity = $activityRepository->get(['branch_id' => $this->branchId]);

    }


    public function getData()
    {
    }


    public function save()
    {

        $this->validate();

        $activityS = app(ActivityRepository::class)->store([
            "branch_id" => $this->branchId,
            "to_time" => $this->to,
            "from_time" => $this->from,
            "week_day" => $this->day,
        ]);
        if ($activityS == null) {
            $this->dispatch('notification', message: __('messages.error request'));
        } else {
            session()->flash('notification', __('messages.success request'));
            $this->redirectRoute('admin.branch.activity', $this->branchId);
        }

    }

    #[On('destroy')]
    public function destroy($id)
    {
        $check = app(ActivityRepository::class)->destroy(['branch_id' => $this->branchId, 'activity_id' => $id]);
        if ($check != null) {
            session()->flash('notification', $check);
            $this->redirectRoute('admin.branch.activity', $this->branchId);
        } else
            $this->dispatch('notification', message: __('messages.error request'));
    }

    public function refreshData()
    {
        $this->render();
    }

    public function render()
    {
        return view('livewire.dashboard.branch.activity')->extends('layouts.app');
    }
}
