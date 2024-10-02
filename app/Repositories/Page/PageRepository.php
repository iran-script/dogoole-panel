<?php

namespace App\Repositories\Page;


use App\Traits\GuzzleTrait;

class PageRepository
{
    use GuzzleTrait;

    public function get($data = [], $header = [])
    {
        $headersFix = ['Authorization' => 'Bearer ' . session('token')];
        $headers = array_merge($headersFix, $header);
        $url = config('config.route.api') . 'admin/page';
        $slider = $this->guzzleGetRequest($url, $data, $headers);
        if ($slider['statusCode'] == 200 and isset($slider['data']['data']) and $slider['data']['data'] != null) {
            return $slider['data']['data'];
        }
        return null;
    }


    public function find($data = [], $header = [])
    {
        $url = config('config.route.api') . 'admin/page/show';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $slider = $this->guzzleGetRequest($url, $data, $headers);
        if ($slider['statusCode'] == 200 and isset($slider['data']['data']) and $slider['data']['data'])
            return $slider['data']['data'];
        return null;
    }

    public function update($data = [], $header = [])
    {

        $url = config('config.route.api') . 'admin/page/update';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $slider = $this->guzzlePutRequest($url, $data, $headers);
        if ($slider['statusCode'] == 200)
            return $slider['data']['message'];
        return null;
    }

    public function store($data = [], $header = [])
    {
        $url = config('config.route.api') . 'admin/page/store';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $slider = $this->guzzlePostRequest($url, $data, $headers);
        if ($slider['statusCode'] == 200 || $slider['statusCode'] == 201)
            return $slider['data']['message'] ?? __('index.success request');
        return null;
    }

    public function destroy($data = [], $header = [])
    {
        $url = config('config.route.api') . 'admin/page/destroy';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $check = $this->guzzleDeleteRequest($url, $data, $headers);
        if ($check['statusCode'] == 200 || $check['statusCode'] == 201)
            return $check['data']['message'] ?? __('index.success request');
        return null;
    }

}
