<?php

namespace App\Repositories\BankAccount;


use App\Traits\GuzzleTrait;

class BankAccountRepository
{
    use GuzzleTrait;

    public function getAll($data = [], $header = [])
    {
        $headersFix = ['Authorization' => 'Bearer ' . session('token')];
        $headers = array_merge($headersFix, $header);
        $url = config('config.route.api') . 'admin/user/bank-account-user';
        $slider = $this->guzzleGetRequest($url, $data, $headers);
        if ($slider['statusCode'] == 200 and isset($slider['data']['data']) and $slider['data']['data'] != null) {
            return $slider['data']['data'];
        }
        return null;
    }
    public function getAllUser($data = [], $header = [])
    {
        $headersFix = ['Authorization' => 'Bearer ' . session('token')];
        $headers = array_merge($headersFix, $header);
        $url = config('config.route.api') . 'user/bank-account/';
        $slider = $this->guzzleGetRequest($url, $data, $headers);
        if ($slider['statusCode'] == 200 and isset($slider['data']['data']) and $slider['data']['data'] != null) {
            return $slider['data']['data'];
        }
        return null;
    }


    public function find($data = [], $header = [])
    {
        $url = config('config.route.api') . 'user/bank-account/show';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $slider = $this->guzzleGetRequest($url, $data, $headers);
        if ($slider['statusCode'] == 200 and isset($slider['data']['data']) and $slider['data']['data'])
            return $slider['data']['data'];
        return null;
    }

    public function update($data = [], $header = [])
    {

        $url = config('config.route.api') . 'user/bank-account/update';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $slider = $this->guzzlePutRequest($url, $data, $headers);
        if ($slider['statusCode'] == 200)
            return $slider['data']['message'];
        return null;
    }

    public function store($data = [], $header = [])
    {
        $url = config('config.route.api') . 'user/bank-account/store';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $slider = $this->guzzlePostRequest($url, $data, $headers);
        if ($slider['statusCode'] == 200 || $slider['statusCode'] == 201)
            return $slider['data']['message'] ?? __('index.success request');
        return null;
    }

    public function destroy($data = [], $header = [])
    {
        $url = config('config.route.api') . 'user/bank-account/destroy';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $check = $this->guzzleDeleteRequest($url, $data, $headers);
        if ($check['statusCode'] == 200 || $check['statusCode'] == 201)
            return $check['data']['message'] ?? __('index.success request');
        return null;
    }

}
