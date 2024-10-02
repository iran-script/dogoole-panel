<?php

namespace App\Repositories\Unit;

use App\Traits\GuzzleTrait;

class UnitRepository
{
    use GuzzleTrait;

    public function get($data = [], $header = [])
    {

        $url = config('config.route.api') . 'admin/unit';
        $headers = ['Authorization' => 'Bearer ' . session('token')];
        $units = $this->guzzleGetRequest($url, $data, $headers);
        if ($units['statusCode'] == 200 and isset($units['data']['data']) and $units['data']['data'])
            return $units['data']['data'];
        return null;

    }
}
