<?php

namespace App\Livewire\Dashboard\User\Client;

use App\Repositories\User\UserRepository;
use App\Traits\GuzzleTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Edit extends Component
{
    use GuzzleTrait;

    #[Validate('required|numeric')]
    public $clientId = 0;

    #[Validate('required|string')]
    public $name;

    #[Validate('required|string')]
    public $family;

    #[Validate('required|min:11|max:11', onUpdate: true)]
    public $mobile = null;


    public $days;
    public $months;
    public $years;
    public $day;
    public $month;
    public $year;
    #[Validate('required')]
    public $userType;
    public $birthDate;

    public function getuserbirthdate()
    {
        $dateParts = explode('/', $this->birthDate);

        unset($dateParts[2]);

        $dateParts = array_values($dateParts);

        return implode('/', $dateParts);
    }

    public function mount($id)
    {
        $this->clientId = $id;
        $this->getClient($id);
        $this->days = range(1, 31);
        $this->months = ['فروردین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور', 'مهر', 'آبان', 'آذر', 'دی', 'بهمن', 'اسفند'];
        $this->years = range(1395, 1340);
    }

    public function getClient($id)
    {
        $client = app(UserRepository::class)->find(['user_id' => $id]);
        if ($client == null) {
            session()->flash('notification', __('messages.problem get data'));
            $this->redirectRoute('admin.user.client.index');
        }
        $this->name = $client['name'] ?? "";
        $this->family = $client['family'] ?? "";
        $this->mobile = $client['mobile'] ?? "";
        $this->userType = $client['role_id'] ?? "";
        $dateParts = explode('/', $client['birth_date']) ?? "";
        $this->day = $dateParts[2] ?? "";
        $this->month = $dateParts[1] ?? "";
        $this->year = $dateParts[0] ?? "";
    }
    public function setChange()
    {
        $this->validate();
        $dateSaveClient = [
            'user_id' => $this->clientId,
            'name' => $this->name,
            'family' => $this->family,
            'mobile' => $this->mobile,
            'birth_date' => ($birthDate = $this->year . '/' . $this->month . '/' . $this->day),
            'role_id' => $this->userType
        ];
        $client = app(UserRepository::class)->update($dateSaveClient);
        if ($client != null) {
            $this->redirectRoute('admin.user.client.index');
        } else
            $this->dispatch('notification', message: __('messages.error request'));
    }

    public function render()
    {
        return view('livewire.dashboard.user.client.edit')->extends('layouts.app');
    }
}
