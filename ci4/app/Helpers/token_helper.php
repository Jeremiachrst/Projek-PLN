<?php

if (!function_exists('generate_api_token')) {
    function generate_api_token()
    {
        $key = 'JeR3M1A123';
        $timestamp = time();
        $minute = floor($timestamp / 60); // Mengambil waktu saat ini dalam satuan menit
        return hash('sha256', $key . $minute);
    }
}
