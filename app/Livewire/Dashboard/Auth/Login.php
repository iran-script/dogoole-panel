<?php

namespace App\Livewire\Dashboard\Auth;

use App\Traits\GuzzleTrait;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\Validate;

class Login extends Component
{
    use GuzzleTrait;

    #[Validate('required|min:11|max:11', onUpdate: true)]
    public $mobile = null;

    public function mount()
    {

        if (session('token')!==null)
            return redirect()->route('admin.index');
    }

    public function sendCode()
    {

        $this->validate();
        $route = config('config.route.api') . 'auth/send_code';
        $check = $this->guzzlePostRequest($route, ['mobile' => $this->mobile]);

        if ($check['statusCode'] === 200 ) {
            Session::put('mobileLogin', $this->mobile);
            session()->flash('notification', __('messages.send code login'));
            $this->redirectRoute('check-code');
        } else {
            $this->dispatch('notification', $check ['data']['message'] ?? " ");
        }
    }

    public function render()
    {
        return view('livewire.dashboard.auth.login')->extends('layouts.auth');
    }
}
