<?php

namespace App\Livewire\Dashboard\Component;
use Livewire\Component;

class Map extends Component
{
    public $lat;
    public $lng;
    public function render()
    {
       return view('livewire.dashboard.component.map');
    }
}
