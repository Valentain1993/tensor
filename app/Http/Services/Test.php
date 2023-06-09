<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class Test
{
    public function __construct()
    {
    }

    public function send($typemethod, $method, $params)
    {
        return Http::withHeaders($typemethod($method, $params));

    }

    public function getData()
    {
        $params = [
            'q' => 'London',
            'limit' => 5,
            'appid' => 'f99f8f8356266d4bd57f4830657e328f',
        ];

        $response = $this->send("GET", "http://api.openweathermap.org/geo/1.0/direct", $params);
        return $response;
    }
}
