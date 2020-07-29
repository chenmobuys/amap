<?php

namespace Chen\Amap\Webservice\Clients;

use Chen\Amap\Client;

class BaseClient extends Client
{
    /**
     * 行政区域查询
     *
     * @param int $subdistrict
     * @param int $page
     * @param int $offset
     * @param string $extensions
     * @param null $keywords
     * @param null $filter
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function district($subdistrict = 1, $page = 1, $offset = 20, $extensions = 'base', $keywords = null, $filter = null)
    {
        $params = compact('subdistrict', 'page', 'offset', 'extensions', 'keywords', 'filter');

        return $this->httpGet('v3/config/district', $params);
    }

    /**
     * 输入提示
     *
     * @param $keywords
     * @param null $type
     * @param null $location
     * @param null $city
     * @param bool $citylimit
     * @param string $datatype
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function inputtips($keywords, $type = null, $location = null, $city = null, $citylimit = false, $datatype = 'all')
    {
        $params = compact('keywords', 'type', 'location', 'city', 'citylimit', 'datatype');

        return $this->httpGet('v3/assistant/inputtips', $params);
    }

    /**
     * 坐标转换
     *
     * @param $locations
     * @param string $coordsys
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function convert($locations, $coordsys = 'autonavi')
    {
        $params = compact('locations', 'coordsys');

        return $this->httpGet('v3/assistant/coordinate/convert', $params);
    }

    /**
     * 静态地图
     *
     * @param $location
     * @param $zoom
     * @param string $size
     * @param int $scale
     * @param int $traffic
     * @param null $markers
     * @param null $labels
     * @param null $paths
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function staticmap($location, $zoom = 1, $size = '400*400', $scale = 1, $traffic = 0, $markers = null, $labels = null, $paths = null)
    {
        $params = compact('location', 'zoom', 'size', 'scale', 'traffic', 'markers', 'labels', 'paths');

        return $this->httpGet('v3/staticmap', $params);
    }

    /**
     * IP定位
     *
     * @param $ip
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function ip($ip)
    {
        $params = compact('ip');

        return $this->httpGet('v3/ip', $params);
    }
}
