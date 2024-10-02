<?php

namespace App\Livewire\Dashboard\Component;

use Livewire\Component;

class Datepicker extends Component
{

    public $showDescriptionText = true;
    public $requirment = false;

    public function render()
    {
        return view('livewire.dashboard.component.datepicker');
    }
}
