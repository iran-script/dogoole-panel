<?php

namespace App\Repositories\Orders;


use App\Traits\GuzzleTrait;

class OrderRepository
{
    use GuzzleTrait;

    public function get($data = [], $header = [])
    {
        $url = config('config.route.api') . 'admin/order';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $response = $this->guzzleGetRequest($url, $data, $headers);

        if ($response['statusCode'] == 200 && isset($response['data']['data']) && $response['data']['data']) {
            return $response['data']['data'];
        }
        return null;
    }

    public function find($data = [], $header = [])
    {

        $url = config('config.route.api') . 'admin/order/show';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $extraType = $this->guzzleGetRequest($url, $data, $headers);
        if ($extraType['statusCode'] == 200 and isset($extraType['data']['data']) and $extraType['data']['data'])
            return $extraType['data']['data'];
        return null;
    }

    public function update($data = [], $header = [])
    {

        $url = config('config.route.api') . 'admin/order/update';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $extraType = $this->guzzlePutRequest($url, $data, $headers);
        if ($extraType['statusCode'] == 200)
            return $extraType['data']['message'];
        return null;
    }

    public function store($data = [], $header = [])
    {
        $url = config('config.route.api') . 'admin/order/store';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $extraType = $this->guzzlePostRequest($url, $data, $headers);
        if ($extraType['statusCode'] == 200 || $extraType['statusCode'] == 201)
            return $extraType['data']['message'] ?? __('index.success request');
        return null;
    }

    public function changeStatus($data = [], $header = [])
    {
        $url = config('config.route.api') . 'admin/order/change-status';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $extraType = $this->guzzlePostRequest($url, $data, $headers);
        if ($extraType['statusCode'] == 200 || $extraType['statusCode'] == 201)
            return $extraType['data']['message'] ?? __('index.success request');
        return null;
    }

    public function getOrderForSend($data = [], $header = [])
    {
        $url = config('config.route.api') . 'admin/user/set-delivery-order';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $extraType = $this->guzzlePostRequest($url, $data, $headers);
        if ($extraType['statusCode'] == 200 || $extraType['statusCode'] == 201)
            return $extraType['data']['message'] ?? __('index.success request');
        return null;
    }

    public function status($data = [], $header = [])
    {
        $url = config('config.route.api') . 'admin/order/change-status';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $extraType = $this->guzzlePostRequest($url, $data, $headers);
        if ($extraType['statusCode'] == 200 || $extraType['statusCode'] == 201) {
            return $extraType['data']['message'] ?? __('index.success request');
        }
        return null;
    }

    public function returned($data = [], $header = [])
    {
        $url = config('config.route.api') . 'admin/order/order-returned';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $extraType = $this->guzzlePostRequest($url, $data, $headers);
        if ($extraType['statusCode'] == 200 || $extraType['statusCode'] == 201) {
            return $extraType['data']['message'] ?? __('index.success request');
        }
        return null;
    }

    public function accept($data = [], $header = [])
    {
        $url = config('config.route.api') . 'admin/order/order-accept';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        return $this->guzzlePostRequestV2($url, $data, $headers);
    }

}
