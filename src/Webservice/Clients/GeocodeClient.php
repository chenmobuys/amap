<?php

namespace Chen\Amap\Webservice\Clients;

use Chen\Amap\Client;

class GeocodeClient extends Client
{
    /**
     * 地理编码
     *
     * @param $address
     * @param bool $batch
     * @param null $city
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function geo($address, $batch = false, $city = null)
    {
        $params = compact('address', 'batch', 'city');

        return $this->httpGet('v3/geocode/geo', $params);
    }

    /**
     * 逆地理编码
     *
     * @param $location
     * @param int $radius
     * @param string $extensions
     * @param bool $batch
     * @param int $homeorcorp
     * @param null $poitype
     * @param null $roadlevel
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function regeo($location, $radius = 1000, $extensions = 'base', $batch = false, $homeorcorp = 0, $poitype = null, $roadlevel = null)
    {
        $params = compact('location', 'radius', 'extensions', 'batch', 'homeorcorp', 'poitype', 'roadlevel');

        return $this->httpGet('v3/geocode/regeo', $params);
    }
}
