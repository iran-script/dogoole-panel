<?php

namespace App\Livewire\Dashboard;

use App\Traits\GuzzleTrait;
use Livewire\Component;

class Index extends Component
{
    use GuzzleTrait;

    public $counts;
    public $getlastcounts;
    public $categories;
    public $data;
    public $user;
    public $registerdate;
    public $clientnumber;

    public function mount()
    {
        $this->user = json_decode(session('user'), true);
        $this->getcount();
        if (session('role_id') == 1)
            $this->getlast();
    }

    public function getcount()
    {
        $url = config('config.route.api') . 'admin/dashboard/get-count';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $this->counts = $this->guzzleGetRequest($url, [], $headers)['data']['data'] ?? [];

        if (isset($this->counts['orders']['latestMonthData'])) {
            $this->categories = array_keys($this->counts['orders']['latestMonthData']) ?? " ";
            $this->data = json_encode(array_values($this->counts['orders']['latestMonthData'])) ?? " ";
            foreach ($this->categories as $key => $item) {
                $this->categories[$key] = jdate($item)->format('m/d') ?? " ";
            }
            $this->categories = json_encode($this->categories);
        }
        return;
    }

    public function getlast()
    {
        $url = config('config.route.api') . 'admin/dashboard/get-latest-user-register-count';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $this->getlastcounts = $this->guzzleGetRequest($url, [], $headers)['data']['data'] ?? [];
        if (isset($this->getlastcounts['counts'])) {
            $this->registerdate = array_keys($this->getlastcounts['counts']) ?? " ";
            $this->clientnumber = json_encode(array_values($this->getlastcounts['counts'])) ?? " ";
            foreach ($this->registerdate as $key => $item) {
                $this->registerdate[$key] = jdate($item)->format('m/d') ?? " ";
            }
            $this->registerdate = json_encode($this->registerdate);
        }
        return;
    }

    public function render()
    {
        return view('livewire.dashboard.index')->extends('layouts.app');
    }
}
