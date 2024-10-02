<?php

namespace App\Livewire\Dashboard\Component;

use Livewire\Component;
use Carbon\Carbon;

class CountdownTimer extends Component
{
    public $targetDate;
    public $remainingTime=0;
    public $id;

    public function mount($targetDate)
    {
        $this->targetDate = Carbon::parse($targetDate);
        $now = Carbon::now();
        if ($targetDate > $now)
            $this->remainingTime = $this->targetDate->diffInSeconds(Carbon::now());


        $this->id = uniqid();
    }

    public function render()
    {
        return view('livewire.dashboard.component.countdown-timer');
    }
}
