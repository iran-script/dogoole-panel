<?php

namespace App\Repositories\ExportImport;


use App\Traits\GuzzleTrait;

class ExportImportRepository
{
    use GuzzleTrait;

    public function get($data = [], $header = [])
    {
        $headersFix = ['Authorization' => 'Bearer ' . session('token')];
        $headers = array_merge($headersFix, $header);
        $url = config('config.route.api') . 'admin/export-import/export';
        $vendor = $this->guzzleGetRequest($url, $data, $headers);
        if ($vendor['statusCode'] == 200 and isset($vendor['data']['data']) and $vendor['data']['data'] != null) {
            return $vendor['data']['data'];
        }
        return null;
    }




}
