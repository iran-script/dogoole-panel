<?php

namespace App\Repositories\User;


use App\Traits\GuzzleTrait;

class UserRepository
{
    use GuzzleTrait;

    public function get($data = [], $header = [])
    {
        $headersFix = ['Authorization' => 'Bearer ' . session('token')];
        $headers = array_merge($headersFix, $header);
        $url = config('config.route.api') . 'admin/user';
        $user = $this->guzzleGetRequest($url, $data, $headers);
        if ($user['statusCode'] == 200 and isset($user['data']['data']) and $user['data']['data'] != null) {
            return $user['data']['data'];
        }
        return null;
    }


    public function find($data = [], $header = [])
    {

        $url = config('config.route.api') . 'admin/user/show';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $extraType = $this->guzzleGetRequest($url, $data, $headers);
        if ($extraType['statusCode'] == 200 and isset($extraType['data']['data']) and $extraType['data']['data'])
            return $extraType['data']['data'];
        return null;
    }

    public function update($data = [], $header = [])
    {

        $url = config('config.route.api') . 'admin/user/update';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $extraType = $this->guzzlePutRequest($url, $data, $headers);
        if ($extraType['statusCode'] == 200)
            return $extraType['data']['message'];
        return null;
    }

    public function store($data = [], $header = [])
    {
        $url = config('config.route.api') . 'admin/user/store';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $extraType = $this->guzzlePostRequest($url, $data, $headers);
        if ($extraType['statusCode'] ==400)
            return $extraType;
        if ($extraType['statusCode'] == 200 || $extraType['statusCode'] == 201)
            return $extraType['data']['data'] ?? __('index.success request');
        return null;
    }

    public function destroy($data = [], $header = [])
    {
        $url = config('config.route.api') . 'admin/user/destroy';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $check = $this->guzzleDeleteRequest($url, $data, $headers);
        if ($check['statusCode'] == 200 || $check['statusCode'] == 201)
            return $check['data']['message'] ?? __('index.success request');
        return null;
    }

}
