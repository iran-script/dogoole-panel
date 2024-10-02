<?php

namespace App\Livewire\Dashboard\Component;

use Livewire\Component;

class Editor extends Component
{
    public $text;

    public function render()
    {
        return view('livewire.dashboard.component.editor');
    }
}
