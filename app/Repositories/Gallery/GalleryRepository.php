<?php

namespace App\Repositories\Gallery;


use App\Traits\GuzzleTrait;

class GalleryRepository
{
    use GuzzleTrait;

    public function get($data = [], $header = [])
    {
        $headersFix = ['Authorization' => 'Bearer ' . session('token')];
        $headers = array_merge($headersFix, $header);
        $url = config('config.route.api') . 'admin/branch/get-gallery';
        $branch = $this->guzzleGetRequest($url, $data, $headers);
        if ($branch['statusCode'] == 200 and isset($branch['data']['data']) and $branch['data']['data'] != null) {
            return $branch['data']['data'];
        }
        return null;
    }


    public function store($data = [], $header = [])
    {
        $url = config('config.route.api') . 'admin/branch/set-gallery';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $extraType = $this->guzzlePostRequest($url, $data, $headers);
        if ($extraType['statusCode'] == 200 || $extraType['statusCode'] == 201)
            return $extraType['data']['message'] ?? __('index.success request');
        return null;
    }



}
