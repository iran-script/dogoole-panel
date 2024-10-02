<?php

namespace App\Repositories\Ticket;


use App\Traits\GuzzleTrait;

class TicketRepository
{
    use GuzzleTrait;

    public function get($data = [], $header = [])
    {
        $url = config('config.route.api') . 'admin/ticket';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $response = $this->guzzleGetRequest($url, $data, $headers);

        if ($response['statusCode'] == 200 && isset($response['data']['data']) && $response['data']['data']) {
            return $response['data']['data'];
        }
        return null;
    }
    public function getCategory($data = [], $header = [])
    {
        $url = config('config.route.api') . 'admin/ticket/get-category';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $response = $this->guzzleGetRequest($url, $data, $headers);
        if ($response['statusCode'] == 200 && isset($response['data']['data']) && $response['data']['data']) {
            return $response['data']['data'];
        }
        return null;
    }

    public function ticket($data = [], $header = [])
    {
        $url = config('config.route.api') . 'admin/ticket/show';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $response = $this->guzzleGetRequest($url, $data, $headers);

        if ($response['statusCode'] == 200 && isset($response['data']['data']) && $response['data']['data']) {
            return $response['data']['data'];
        }
        return null;
    }

    public function find($data = [], $header = [])
    {
        $url = config('config.route.api') . 'admin/ticket/show';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $extraType = $this->guzzleGetRequest($url, $data, $headers);
        if ($extraType['statusCode'] == 200 and isset($extraType['data']['data']) and $extraType['data']['data'])
            return $extraType['data']['data'];
        return null;
    }

    public function update($data = [], $header = [])
    {

        $url = config('config.route.api') . 'admin/ticket/update';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $extraType = $this->guzzlePutRequest($url, $data, $headers);
        if ($extraType['statusCode'] == 200)
            return $extraType['data']['message'];
        return null;
    }

    public function store($data = [], $header = [])
    {
        $url = config('config.route.api') . 'admin/ticket/create';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $extraType = $this->guzzlePostRequest($url, $data, $headers);
        if ($extraType['statusCode'] == 200 || $extraType['statusCode'] == 201)
            return $extraType['data']['message'] ?? __('index.success request');
        return null;
    }

    public function status($data = [], $header = [])
    {
        $url = config('config.route.api') . 'admin/ticket/change-status';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $extraType = $this->guzzlePostRequest($url, $data, $headers);
        if ($extraType['statusCode'] == 200 || $extraType['statusCode'] == 201) {
            return $extraType['data']['message'] ?? __('index.success request');
        }

        return null;
    }

}
