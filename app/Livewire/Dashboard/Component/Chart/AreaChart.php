<?php

namespace App\Livewire\Dashboard\Component\chart;

use Livewire\Component;

class AreaChart extends Component
{
    public $data, $categories;



    public function render()
    {
        return view('livewire.dashboard.component.chart.areachart');
    }
}
