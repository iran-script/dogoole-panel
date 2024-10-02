<?php

namespace App\Repositories;

use App\Traits\GuzzleTrait;

class PreparationTimeRepository
{
    use GuzzleTrait;

    public function get($data = [], $header = [])
    {
        $headersFix = ['Authorization' => 'Bearer ' . session('token')];
        $headers = array_merge($headersFix, $header);
        $url = config('config.route.api') . 'admin/preparation-time/';
        return $this->guzzleGetRequestV2($url, $data, $headers);
    }

}
