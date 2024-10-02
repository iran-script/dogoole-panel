<?php
namespace App\Livewire\Dashboard\User;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\Validate;

class Create extends Component
{
//    public $branchName;
//    public $branchMetaTitle;
//    public $branchMetasm;
//    public $branchlat;
//    public $branchlang;
//    public $firstName;
//    public $lastName;
//    public $mobile;

//    #[Validate('required|', onUpdate: true)]

    public function mount()
    {
    }
    public function render()
    {
        return view('livewire.dashboard.user.create')->extends('layouts.app');
    }
}
