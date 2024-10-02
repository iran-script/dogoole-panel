<?php

namespace App\Repositories\Branch;


use App\Traits\GuzzleTrait;

class BranchRepository
{
    use GuzzleTrait;

    public function get($data = [], $header = [])
    {
        $headersFix = ['Authorization' => 'Bearer ' . session('token')];
        $headers = array_merge($headersFix, $header);
        $url = config('config.route.api') . 'admin/branch';
        $branch = $this->guzzleGetRequest($url, $data, $headers);
        if ($branch['statusCode'] == 200 and isset($branch['data']['data']) and $branch['data']['data'] != null) {
            return $branch['data']['data'];
        }
        return null;
    }


    public function find($data = [], $header = [])
    {

        $url = config('config.route.api') . 'admin/branch/show';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $extraType = $this->guzzleGetRequest($url, $data, $headers);
        if ($extraType['statusCode'] == 200 and isset($extraType['data']['data']) and $extraType['data']['data'])
            return $extraType['data']['data'];
        return null;
    }

    public function update($data = [], $header = [])
    {


        $url = config('config.route.api') . 'admin/branch/update';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $extraType = $this->guzzlePutRequest($url, $data, $headers);

        if ($extraType['statusCode'] == 200)
            return $extraType['data']['message'];
        return null;
    }

    public function store($data = [], $header = [])
    {
        $url = config('config.route.api') . 'admin/branch/store';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        return $this->guzzlePostRequestV2($url, $data, $headers);
    }

    public function destroy($data = [], $header = [])
    {
        $url = config('config.route.api') . 'admin/branch/destroy';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $check = $this->guzzleDeleteRequest($url, $data, $headers);
        if ($check['statusCode'] == 200 || $check['statusCode'] == 201)
            return $check['data']['message'] ?? __('index.success request');
        return null;
    }


    public function shipmentAreas($data = [], $header = [])
    {
        $url = config('config.route.api') . 'admin/branch/delivery-areas';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $response = $this->guzzleGetRequest($url, $data, $headers);
        if ($response['statusCode'] == 200 and isset($response['data']['data']) and $response['data']['data'] != null) {
            return $response['data']['data'];
        }
        return null;
    }


    public function setOrUpdateAreaDelivery($data = [], $header = [])
    {
        $url = config('config.route.api') . 'admin/branch/set-or-update-area-delivery';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $response = $this->guzzlePostRequest($url, $data, $headers);
        if ($response['statusCode'] == 200 || $response['statusCode'] == 201)
            return $response['data']['message'] ?? __('index.success request');
        return null;
    }

    public function setOrUpdateDeliveryType($branchId, $data = [])
    {
        $url = config('config.route.api') . 'admin/branch/set-or-update-delivery-type/' . $branchId;
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        return $this->guzzlePostRequestV2($url, $data, $headers);
    }
    public function getOrUpdateDeliveryType($branchId, $data = [])
    {
        $url = config('config.route.api') . 'admin/branch/get-delivery-type/' . $branchId;
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        return $this->guzzleGetRequestV2($url, $data, $headers);
    }

    public function detachDeliveryArea($data = [], $header = [])
    {
        $url = config('config.route.api') . 'admin/branch/detach-delivery-area';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $check = $this->guzzleDeleteRequest($url, $data, $headers);
        if ($check['statusCode'] == 200 || $check['statusCode'] == 201)
            return $check['data']['message'] ?? __('index.success request');
        return null;
    }

}
