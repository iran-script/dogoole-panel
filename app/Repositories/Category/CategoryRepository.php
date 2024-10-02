<?php

namespace App\Repositories\Category;


use App\Traits\GuzzleTrait;

class CategoryRepository
{
    use GuzzleTrait;

    public function get($data = [], $header = [])
    {
        $headersFix = ['Authorization' => 'Bearer ' . session('token')];
        $headers = array_merge($headersFix, $header);
        $url = config('config.route.api') . 'admin/category';
        $user = json_decode(session('user'), true);
        $dataA=[];
        $dataA = array_merge($dataA, $data);
        $categories = $this->guzzleGetRequest($url, $dataA, $headers);
        if ($categories['statusCode'] == 200 and isset($categories['data']['data']) and $categories['data']['data'] != null) {
            return $categories['data']['data'];
        }
        return null;
    }


    public function find($data = [], $header = [])
    {

        $url = config('config.route.api') . 'admin/category/show';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $extraType = $this->guzzleGetRequest($url, $data, $headers);
        if ($extraType['statusCode'] == 200 and isset($extraType['data']['data']) and $extraType['data']['data'])
            return $extraType['data']['data'];
        return null;
    }

    public function update($data = [], $header = [])
    {

        $url = config('config.route.api') . 'admin/category/update';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $extraType = $this->guzzlePutRequest($url, $data, $headers);
        if ($extraType['statusCode'] == 200)
            return $extraType['data']['message'];
        return null;
    }

    public function store($data = [], $header = [])
    {
        $url = config('config.route.api') . 'admin/category/store';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $user = json_decode(session('user'), true);
        $dataA = ['branch_id' => session('target_role_id')];
        $dataA = array_merge($dataA, $data);
        $extraType = $this->guzzlePostRequest($url, $dataA, $headers);
        if ($extraType['statusCode'] == 200 || $extraType['statusCode'] == 201)
            return $extraType['data']['message'] ?? __('index.success request');
        return null;
    }

    public function destroy($data = [], $header = [])
    {
        $url = config('config.route.api') . 'admin/category/destroy';
        $headers = ['Authorization' => 'Bearer ' . session('token')];

        $user = json_decode(session('user'), true);
        $dataA = ['branch_id' => session('target_role_id')];
        $dataA = array_merge($dataA, $data);

        $check = $this->guzzleDeleteRequest($url, $dataA, $headers);

        if ($check['statusCode'] == 200 || $check['statusCode'] == 201)
            return $check['data']['message'] ?? __('index.success request');
        return null;
    }

}
