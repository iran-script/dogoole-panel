<?php

namespace App\Repositories\Settlement;


use App\Traits\GuzzleTrait;

class SettlementRepository
{
    use GuzzleTrait;

    public function get($data = [], $header = [])
    {
        $headersFix = ['Authorization' => 'Bearer ' . session('token')];
        $headers = array_merge($headersFix, $header);
        $url = config('config.route.api') . 'admin/settlement';
        $data = array_merge($data, $data);
        $categories = $this->guzzleGetRequest($url, $data, $headers);
        if ($categories['statusCode'] == 200 and isset($categories['data']['data']) and $categories['data']['data'] != null) {
            return $categories['data']['data'];
        }
        return null;
    }

    public function getWallet($data = [], $header = [])
    {
        $headersFix = ['Authorization' => 'Bearer ' . session('token')];
        $headers = array_merge($headersFix, $header);
        $url = config('config.route.api') . 'admin/settlement/get-wallet-restaurant';
        $data = array_merge($data, $data);
        $categories = $this->guzzleGetRequest($url, $data, $headers);
        if ($categories['statusCode'] == 200 and isset($categories['data']['data']) and $categories['data']['data'] != null) {
            return $categories['data']['data'];
        }
        return null;
    }


    public function find($data = [], $header = [])
    {

        $url = config('config.route.api') . 'admin/settlement/show';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $extraType = $this->guzzleGetRequest($url, $data, $headers);
        if ($extraType['statusCode'] == 200 and isset($extraType['data']['data']) and $extraType['data']['data'])
            return $extraType['data']['data'];
        return null;
    }

    public function update($data = [], $header = [])
    {
        $url = config('config.route.api') . 'admin/settlement/change-status';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $extraType = $this->guzzlePutRequest($url, $data, $headers);
        if (isset($extraType['errors']))
        {
            return $extraType['errors']['message']??null;
        }
        return $extraType['data']['message']??null;
    }

    public function store($data = [], $header = [])
    {
        $url = config('config.route.api') . 'admin/settlement/store';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $extraType = $this->guzzlePostRequest($url, $data, $headers);
        if ($extraType['statusCode'] == 200 || $extraType['statusCode'] == 201)
            return $extraType['data']['message'] ?? __('index.success request');
        return null;
    }

    public function destroy($data = [], $header = [])
    {
        $url = config('config.route.api') . 'admin/settlement/destroy';
        $headers = ['Authorization' => 'Bearer ' . session('token')];

        $user = json_decode(session('user'), true);
        $data = ['branch_id' => 1];
        $data = array_merge($data, $data);

        $check = $this->guzzleDeleteRequest($url, $data, $headers);

        if ($check['statusCode'] == 200 || $check['statusCode'] == 201)
            return $check['data']['message'] ?? __('index.success request');
        return null;
    }

}
