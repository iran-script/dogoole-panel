<?php
namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;
#[Layout('layouts.app')]
class CreatePost extends Component
{
    public $title;
    public function mount($title = null)
    {
        $this->tittle = $title;
    }
    public function render()
    {
        return view('livewire.create-post')->extends('layouts.app')->section('content');
    }
}
