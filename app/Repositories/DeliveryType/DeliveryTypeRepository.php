<?php

namespace App\Repositories\DeliveryType;


use App\Traits\GuzzleTrait;

class DeliveryTypeRepository
{
    use GuzzleTrait;

    public function get($data = [], $header = [])
    {
        $headersFix = ['Authorization' => 'Bearer ' . session('token')];
        $headers = array_merge($headersFix, $header);
        $url = config('config.route.api') . 'admin/delivery-type';
        $categories = $this->guzzleGetRequest($url, $data, $headers);
        if ($categories['statusCode'] == 200 and isset($categories['data']['data']) and $categories['data']['data'] != null) {
            return $categories['data']['data'];
        }
        return null;
    }


    public function find($data = [], $header = [])
    {
        $url = config('config.route.api') . 'admin/delivery-type/show/' . $data['delivery_type_id'];
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $extraType = $this->guzzleGetRequest($url, [], $headers);
        if ($extraType['statusCode'] == 200 and isset($extraType['data']['data']) and $extraType['data']['data'])
            return $extraType['data']['data'];
        return null;
    }

    public function update($data = [], $header = [])
    {
        $url = config('config.route.api') . 'admin/delivery-type/update/' . $data['delivery_type_id'];
        unset($data['delivery_type_id']);
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $extraType = $this->guzzlePutRequest($url, $data, $headers);
        if ($extraType['statusCode'] == 200)
            return $extraType['data']['message'];
        return null;
    }

    public function store($data = [], $header = [])
    {
        $url = config('config.route.api') . 'admin/delivery-type/store';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $extraType = $this->guzzlePostRequest($url, $data, $headers);
        if ($extraType['statusCode'] == 200 || $extraType['statusCode'] == 201)
            return $extraType['data']['message'] ?? __('index.success request');
        return null;
    }

    public function destroy($data = [], $header = [])
    {
        $url = config('config.route.api') . 'admin/delivery-type/destroy/' . $data['delivery_type_id'];
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $check = $this->guzzleDeleteRequest($url, [], $headers);
        if ($check['statusCode'] == 200 || $check['statusCode'] == 201)
            return $check['data']['message'] ?? __('index.success request');
        return null;
    }

}
