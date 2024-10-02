<?php

namespace App\Livewire\Dashboard\Component\chart;

use Livewire\Component;

class ColumnChart extends Component
{
    public $clientnumber, $registerdate;



    public function render()
    {
        return view('livewire.dashboard.component.chart.columnchart');
    }
}
