<?php

namespace App\Repositories\Setting;


use App\Traits\GuzzleTrait;

class SettingRepository
{
    use GuzzleTrait;

    public function get($data = [], $header = [])
    {
        $headersFix = ['Authorization' => 'Bearer ' . session('token')];
        $headers = array_merge($headersFix, $header);
        $url = config('config.route.api') . 'admin/setting/get-with-names';
        $vendor = $this->guzzleGetRequest($url, $data, $headers);
        if ($vendor['statusCode'] == 200 and isset($vendor['data']['data']) and $vendor['data']['data'] != null) {
            return $vendor['data']['data'];
        }
        return null;
    }

    public function getFront($data = [], $header = [])
    {
        $headersFix = ['Authorization' => 'Bearer ' . session('token')];
        $headers = array_merge($headersFix, $header);
        $url = config('config.route.api') . 'front-setting';
        $data = $this->guzzleGetRequest($url, [], $headers);
        if ($data['statusCode'] == 200 and isset($data['data']) and $data['data'] != null) {
            return $data['data'];
        }
        return null;
    }


    public function storeOrUpdate($data = [], $header = [])
    {
        $url = config('config.route.api') . 'admin/setting/storeOrUpdate';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $extraType = $this->guzzlePostRequest($url, $data, $headers);
        if ($extraType['statusCode'] ==400)
            return $extraType;
        if ($extraType['statusCode'] == 200 || $extraType['statusCode'] == 201)
            return $extraType['data']['data'] ?? __('index.success request');
        return null;
    }


}
