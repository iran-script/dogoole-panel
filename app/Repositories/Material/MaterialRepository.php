<?php

namespace App\Repositories\Material;

use App\Traits\GuzzleTrait;

class MaterialRepository
{
    use GuzzleTrait;


    public function get($data = [], $header = [])
    {
        $headersFix = ['Authorization' => 'Bearer ' . session('token')];
        $headers = array_merge($headersFix, $header);
        $url = config('config.route.api') . 'admin/material';
        $categories = $this->guzzleGetRequest($url, $data, $headers);
        if ($categories['statusCode'] == 200 and isset($categories['data']['data']) and $categories['data']['data'] != null) {
            return $categories['data']['data'];
        }
        return null;
    }
    public function getAll($data = [], $header = [])
    {
        $headersFix = ['Authorization' => 'Bearer ' . session('token')];
        $headers = array_merge($headersFix, $header);
        $url = config('config.route.api') . 'admin/material/all';
        $categories = $this->guzzleGetRequest($url, $data, $headers);

        if ($categories['statusCode'] == 200 and isset($categories['data']['data']) and $categories['data']['data'] != null) {
            return $categories['data']['data'];
        }
        return null;
    }

    public function find($data = [], $header = [])
    {

        $url = config('config.route.api') . 'admin/material/show';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $material = $this->guzzleGetRequest($url, $data, $headers);
        if ($material['statusCode'] == 200 and isset($material['data']['data']) and $material['data']['data'])
            return $material['data']['data'];
        return null;
    }

    public function update($data = [], $header = [])
    {

        $url = config('config.route.api') . 'admin/material/update';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $material = $this->guzzlePutRequest($url, $data, $headers);
        if ($material['statusCode'] == 200)
            return $material['data']['message'];
        return null;
    }

    public function store($data = [], $header = [])
    {
        $url = config('config.route.api') . 'admin/material/store';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $material = $this->guzzlePostRequest($url, $data, $headers);
        if ($material['statusCode'] == 200 || $material['statusCode'] == 201)
            return $material['data']['message'] ?? __('index.success request');
        return null;
    }

    public function destroy($data = [], $header = [])
    {
        $url = config('config.route.api') . 'admin/material/destroy';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $check = $this->guzzleDeleteRequest($url, $data, $headers);
        if ($check['statusCode'] == 200 || $check['statusCode'] == 201)
            return $check['data']['message'] ?? __('index.success request');
        return null;
    }
}
