<?php

namespace Chen\Amap\Webservice\Clients;

use Chen\Amap\Client;

class DirectionClient extends Client
{
    /**
     * 步行路径规划
     *
     * @param $origin
     * @param $destination
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function walking($origin, $destination)
    {
        $params = compact('origin', 'destination');

        return $this->httpGet('v3/direction/walking', $params);
    }

    /**
     * 公交路径规划
     *
     * @param $origin
     * @param $destination
     * @param $city
     * @param string $extensions
     * @param int $strategy
     * @param int $nightflag
     * @param null $cityd
     * @param null $date
     * @param null $time
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function transit($origin, $destination, $city, $extensions = 'base', $strategy = 0, $nightflag = 0, $cityd = null, $date = null, $time = null)
    {
        $params = compact('origin', 'destination', 'city', 'extensions', 'strategy', 'nightflag', 'cityd', 'date', 'time');

        return $this->httpGet('v3/direction/transit/integrated', $params);
    }

    /**
     * 驾车路径规划
     *
     * @param $origin
     * @param $destination
     * @param string $extensions
     * @param int $strategy
     * @param int $cartype
     * @param int $ferry
     * @param bool $roadaggregation
     * @param int $nosteps
     * @param null $originid
     * @param null $destinationid
     * @param null $origintype
     * @param null $destinationtype
     * @param null $waypoints
     * @param null $avoidpolygons
     * @param null $avoidroad
     * @param null $province
     * @param null $number
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function driving(
        $origin, $destination, $extensions = 'base', $strategy = 0, $cartype = 0, $ferry = 0, $roadaggregation = false, $nosteps = 0,
        $originid = null, $destinationid = null, $origintype = null, $destinationtype = null, $waypoints = null, $avoidpolygons = null,
        $avoidroad = null, $province = null, $number = null)
    {
        $params = compact('origin', 'destination', 'extensions', 'strategy', 'cartype', 'ferry', 'roadaggregation', 'nosteps',
            'originid', 'destinationid', 'origintype', 'destinationtype', 'waypoints', 'avoidpolygons', 'avoidroad', 'province', 'number'
        );

        return $this->httpGet('v3/direction/driving', $params);
    }

    /**
     * 骑行路径规划
     *
     * @param $origin
     * @param $destination
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function bicycling($origin, $destination)
    {
        $params = compact('origin', 'destination');

        return $this->httpGet('v4/direction/bicycling', $params);
    }

    /**
     * 货车路径规划
     *
     * @param $origin
     * @param $destination
     * @param $size
     * @param int $strategy
     * @param int $cartype
     * @param bool $showpolyline
     * @param int $nosteps
     * @param float $height
     * @param float $width
     * @param int $load
     * @param float $weight
     * @param int $axis
     * @param null $originid
     * @param null $destinationid
     * @param null $origintype
     * @param null $destinationtype
     * @param null $diu
     * @param null $waypoints
     * @param null $avoidpolygons
     * @param null $province
     * @param null $number
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function truck(
        $origin, $destination, $size, $strategy = 0, $cartype = 0, $showpolyline = false, $nosteps = 0,
        $height = 1.6, $width = 2.5, $load = 10, $weight = 0.9, $axis = 2,
        $originid = null, $destinationid = null, $origintype = null, $destinationtype = null,
        $diu = null, $waypoints = null, $avoidpolygons = null, $province = null, $number = null
    )
    {
        $params = compact('origin', 'destination', 'size', 'strategy', 'cartype', 'showpolyline', 'nosteps', 'height', 'width', 'load', 'weight', 'axis', 'originid',
            'destinationid', 'origintype', 'destinationtype', 'diu', 'waypoints', 'avoidpolygons', 'province', 'number'
        );

        return $this->httpGet('v4/direction/truck', $params);
    }

    /**
     * 距离测量
     *
     * @param $origins
     * @param $destination
     * @param int $type
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function distance($origins, $destination, $type = 1)
    {
        $params = compact('origins', 'destination', 'type');

        return $this->httpGet('v3/distance', $params);
    }
}
