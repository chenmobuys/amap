<?php

namespace Chen\Amap\Webservice\Clients;

use Chen\Amap\Client;

class WeatherClient extends Client
{
    public function weatherInfo($city, $extensions = null)
    {
        $params = compact('city', 'extensions');

        return $this->httpGet('v3/weather/weatherInfo', $params);
    }
}
