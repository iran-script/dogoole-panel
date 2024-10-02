<?php

namespace App\Repositories\Product;


use App\Traits\GuzzleTrait;

class ProductRepository
{
    use GuzzleTrait;

    public function get($data = [], $header = [])
    {
        $headersFix = ['Authorization' => 'Bearer ' . session('token')];
        $headers = array_merge($headersFix, $header);
        $url = config('config.route.api') . 'admin/product';
        $user = json_decode(session('user'), true);
        $dataA = [];
        $dataA = array_merge($dataA, $data);
        $categories = $this->guzzleGetRequest($url, $dataA, $headers);
        if ($categories['statusCode'] == 200 and isset($categories['data']['data']) and $categories['data']['data'] != null) {
            return $categories['data']['data'];
        }
        return null;
    }

    public function find($data = [], $header = [])
    {

        $url = config('config.route.api') . 'admin/product/show';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $extraType = $this->guzzleGetRequest($url, $data, $headers);
        if ($extraType['statusCode'] == 200 and isset($extraType['data']['data']) and $extraType['data']['data'])
            return $extraType['data']['data'];
        return null;
    }

    public function update($data = [], $header = [])
    {
        $url = config('config.route.api') . 'admin/product/update';
        $headers = ['Authorization' => 'Bearer ' . session('token')];

        $user = json_decode(session('user'), true);
        $dataA = [];
        $dataA = array_merge($dataA, $data);

        $response = $this->guzzlePutRequest($url, $dataA, $headers);
        if ($response['statusCode'] == 400)
            return ['status' => 400, 'message' => $response['error'] ?? __('messages.error request')];
        elseif ($response['statusCode'] == 200)
            return ['status' => 200, 'message' => $response['data']['message']];
        return ['status' => 500, 'message' => $response['data']['message']];
    }

    public function store($data = [], $header = [])
    {
        $url = config('config.route.api') . 'admin/product/store';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $user = json_decode(session('user'), true);
        $dataA = [];
        $dataA = array_merge($dataA, $data);
        $extraType = $this->guzzlePostRequest($url, $dataA, $headers);
        if ($extraType['statusCode'] == 200 || $extraType['statusCode'] == 201)
            return $extraType['data']['data'] ?? __('index.success request');
        return null;
    }

    public function updateCountVariety($data = [], $header = [])
    {
        $url = config('config.route.api') . 'admin/product/update_count_variety';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        return $this->guzzlePostRequestV2($url, $data, $headers);
    }

    public function updateOrStoreVarieties($data = [], $productId)
    {
        $url = config('config.route.api') . 'admin/product/update-or-store-varieties/' . $productId;
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        return $this->guzzlePostRequestV2($url, $data, $headers);

    }

    public function setMaterials($data = [], $header = [])
    {
        $url = config('config.route.api') . 'admin/product/set-materials';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $extraType = $this->guzzlePostRequest($url, $data, $headers);
        if ($extraType['statusCode'] == 200 || $extraType['statusCode'] == 201)
            return $extraType['data']['message'] ?? __('index.success request');
        return null;
    }

    public function setGallery($data = [], $header = [])
    {
        $url = config('config.route.api') . 'admin/product/set-gallery';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $extraType = $this->guzzlePostRequest($url, $data, $headers);
        if ($extraType['statusCode'] == 200 || $extraType['statusCode'] == 201)
            return $extraType['data']['message'] ?? __('index.success request');
        return null;
    }

    public function destroy($data = [], $header = [])
    {
        $url = config('config.route.api') . 'admin/product/destroy';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $user = json_decode(session('user'), true);
        $dataA = [];
        $dataA = array_merge($dataA, $data);
        $check = $this->guzzleDeleteRequest($url, $dataA, $headers);
        if ($check['statusCode'] == 200 || $check['statusCode'] == 201)
            return $check['data']['message'] ?? __('index.success request');
        return null;
    }
}
