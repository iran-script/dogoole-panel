<?php

namespace App\Repositories\Extra;

use App\Traits\GuzzleTrait;

class ExtraRepository
{
    use GuzzleTrait;

    public function get($data = [], $header = [])
    {
        $url = config('config.route.api') . 'admin/extra';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $headers = array_merge($headers, $header);
        $user = json_decode(session('user'), true);
        $dataA = ['branch_id' => 1];
        $dataA = array_merge($dataA, $data);
        $extraType = $this->guzzleGetRequest($url, $dataA, $headers);
        if ($extraType['statusCode'] == 200 and isset($extraType['data']['data']) and $extraType['data']['data'])
            return $extraType['data']['data'];
        return null;
    }

    public function find($data = [], $header = [])
    {

        $url = config('config.route.api') . 'admin/extra/show';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $extraType = $this->guzzleGetRequest($url, $data, $headers);
        if ($extraType['statusCode'] == 200 and isset($extraType['data']['data']) and $extraType['data']['data'])
            return $extraType['data']['data'];
        return null;
    }

    public function update($data = [], $header = [])
    {

        $url = config('config.route.api') . 'admin/extra/update';
        $headers = ['Authorization' => 'Bearer ' . session('token')];

        $user = json_decode(session('user'), true);
        $dataA = ['branch_id' => 1];
        $dataA = array_merge($dataA, $data);

        $extraType = $this->guzzlePutRequest($url, $dataA, $headers);
        if ($extraType['statusCode'] == 200)
            return $extraType['data']['message'];
        return null;
    }

    public function store($data = [], $header = [])
    {
        $url = config('config.route.api') . 'admin/extra/store';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $user = json_decode(session('user'), true);
        $dataA = ['branch_id' => 1];
        $dataA = array_merge($dataA, $data);
        $extraType = $this->guzzlePostRequest($url, $dataA, $headers);
        if ($extraType['statusCode'] == 200 || $extraType['statusCode'] == 201)
            return $extraType['data']['message'] ?? __('index.success request');
        return null;
    }

    public function destroy($data = [], $header = [])
    {
        $url = config('config.route.api') . 'admin/extra/destroy';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $check = $this->guzzleDeleteRequest($url, $data, $headers);
        if ($check['statusCode'] == 200 || $check['statusCode'] == 201)
            return $check['data']['message'] ?? __('index.success request');
        return null;
    }
}
