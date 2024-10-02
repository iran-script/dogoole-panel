<?php

function getSettingWithName($names)
{
    return app(\App\Repositories\Setting\SettingRepository::class)->getFront(["names" => $names, "branch_id" => null]) ?? [];
}

function getSystemMode()
{
    $systemType = session('system_mode');
    if ($systemType != null)
        return $systemType;
    else {
        $systemType = app(\App\Repositories\Setting\SettingRepository::class)->getFront(["names" => "systemMode", "branch_id" => null]) ?? [];
        \Illuminate\Support\Facades\Session::put('system_mode', $systemType['systemMode'] ?? null);
        return $systemType['systemMode'] ?? 'single';
    }
}

