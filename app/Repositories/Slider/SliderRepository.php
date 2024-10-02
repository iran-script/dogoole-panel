<?php

namespace App\Repositories\Slider;


use App\Traits\GuzzleTrait;

class SliderRepository
{
    use GuzzleTrait;

    public function get($data = [], $header = [])
    {
        $headersFix = ['Authorization' => 'Bearer ' . session('token')];
        $headers = array_merge($headersFix, $header);
        $url = config('config.route.api') . 'admin/slider';
        $slider = $this->guzzleGetRequest($url, $data, $headers);
        if ($slider['statusCode'] == 200 and isset($slider['data']['data']) and $slider['data']['data'] != null) {
            return $slider['data']['data'];
        }
        return null;
    }


    public function find($data = [], $header = [])
    {
        $url = config('config.route.api') . 'admin/slider/show';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $slider = $this->guzzleGetRequest($url, $data, $headers);
        if ($slider['statusCode'] == 200 and isset($slider['data']['data']) and $slider['data']['data'])
            return $slider['data']['data'];
        return null;
    }

    public function update($data = [], $header = [])
    {

        $url = config('config.route.api') . 'admin/slider/update';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $response = $this->guzzlePutRequest($url, $data, $headers);

        if ($response['statusCode'] == 400)
            return ['status' => 400, 'message' => $response['error'] ?? __('messages.error request')];
        elseif ($response['statusCode'] == 200 || $response['statusCode'] == 201)
            return ['status' => 200, 'message' => $response['data']['message'] ?? '', 'data' => $response['data']['data'] ?? []];
        return ['status' => 500, 'message' => __('messages.error request')];

    }

    public function store($data = [], $header = [])
    {
        $url = config('config.route.api') . 'admin/slider/store';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $response = $this->guzzlePostRequest($url, $data, $headers);
        if ($response['statusCode'] == 400)
            return ['status' => 400, 'message' => $response['error'] ?? __('messages.error request')];
        elseif ($response['statusCode'] == 200 || $response['statusCode'] == 201)
            return ['status' => 200, 'message' => $response['data']['message'] ?? '', 'data' => $response['data']['data'] ?? []];
        return ['status' => 500, 'message' => __('messages.error request')];

    }

    public function destroy($data = [], $header = [])
    {
        $url = config('config.route.api') . 'admin/slider/destroy';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $check = $this->guzzleDeleteRequest($url, $data, $headers);

        if ($check['statusCode'] == 200 || $check['statusCode'] == 201)
            return $check['data']['message'] ?? __('index.success request');
        return null;
    }

}
