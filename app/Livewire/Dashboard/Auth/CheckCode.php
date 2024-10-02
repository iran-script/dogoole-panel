<?php

namespace App\Livewire\Dashboard\Auth;

use App\Traits\GuzzleTrait;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\Attributes\Validate;

class CheckCode extends Component
{
    use GuzzleTrait;

    public $mobile;
    #[Validate('required|min:4|max:4', onUpdate: true)]
    public $code = null;

    public function mount()
    {
        $this->mobile = Session::get('mobileLogin');
        if ($this->mobile == null || $this->mobile == " ") {
            session()->flash('notification', __('messages.pleas mobile entered'));
            $this->redirectRoute('login');
        }
    }

    public function checkCode()
    {
        $this->validate();
        $route = config('config.route.api') . 'auth/check_code';
        $check = $this->guzzlePostRequest($route, ['mobile' => $this->mobile, 'code' => $this->code]);
        if ($check['statusCode'] == 200 and isset($check['data']['data'])) {
            Session::put('token', $check['data']['data']['token']);
            Session::put('user', json_encode($check['data']['data']['user']));
            Session::put('role_id', $check['data']['data']['user']['role_id']);
            Session::put('target_role_id', $check['data']['data']['user']['target_role_id']);
            $this->redirectRoute('admin.index');
        } else
            $this->dispatch('notification', message: __('messages.error request'));
    }

    public function render()
    {
        return view('livewire.dashboard.auth.check-code')->extends('layouts.auth');
    }
}
