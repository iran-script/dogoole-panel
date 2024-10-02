<?php
namespace App\Livewire\Dashboard\User\Client;

use App\Repositories\User\UserRepository;
use App\Traits\GuzzleTrait;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Create extends Component
{
    use GuzzleTrait;

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

    public function mount()
    {
        $this->days = range(1, 31);
        $this->months = ['فروردین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور', 'مهر', 'آبان', 'آذر', 'دی', 'بهمن', 'اسفند'];
        $this->years = range(1395, 1340);

    }
    public function getuserbirthdate()
    {
        $dateParts = explode('/', $this->birthDate);

        unset($dateParts[2]);

        $dateParts = array_values($dateParts);

        return implode('/', $dateParts);
    }
    public function setChange()
    {
        $this->validate();
        $dateSaveClient = [
            'name' => $this->name,
            'family' => $this->family,
            'mobile' => $this->mobile,
            'birth_date' => ($birthDate = $this->year . '/' . $this->month . '/' . $this->day),
            'role_id' => $this->userType
        ];
        $client = app(UserRepository::class)->store($dateSaveClient);
        if ($client != null) {
            $this->redirectRoute('admin.user.client.index');
        } else
            $this->dispatch('notification', message: __('messages.error request'));
    }
    public function render()
    {
        return view('livewire.dashboard.user.client.create')->extends('layouts.app');
    }
}
