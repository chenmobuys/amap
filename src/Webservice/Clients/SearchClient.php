<?php

namespace Chen\Amap\Webservice\Clients;

use Chen\Amap\Kernel\Client;

class SearchClient extends Client
{
    /**
     * 关键字搜索
     *
     * @param $keywords
     * @param $types
     * @param int $page
     * @param int $offset
     * @param bool $citylimit
     * @param string $extensions
     * @param null $city
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function text($keywords = null, $types = null, $page = 1, $offset = 20, $citylimit = false, $extensions = 'base', $city = null)
    {
        $params = compact('keywords', 'types', 'page', 'offset', 'citylimit', 'extensions', 'city');

        return $this->httpGet('v3/place/text', $params);
    }

    /**
     * 周边搜索
     *
     * @param $location
     * @param $keywords
     * @param int $page
     * @param int $offset
     * @param int $radius
     * @param string $sortrule
     * @param bool $citylimit
     * @param string $extensions
     * @param null $types
     * @param null $city
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function around($location, $keywords, $page = 1, $offset = 20, $radius = 3000, $sortrule = 'distance', $citylimit = false, $extensions = 'base', $types = null, $city = null)
    {
        $params = compact('location', 'keywords', 'page', 'offset', 'radius', 'sortrule', 'citylimit', 'extensions', 'types', 'city');

        return $this->httpGet('v3/place/around', $params);
    }

    /**
     * 多边形搜索
     *
     * @param $polygon
     * @param $keywords
     * @param int $page
     * @param int $offset
     * @param string $extensions
     * @param null $types
     * @param null $city
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function polygon($polygon, $keywords = null, $page = 1, $offset = 20, $extensions = 'base', $types = null, $city = null)
    {
        $params = compact('polygon', 'keywords', 'page', 'offset', 'extensions', 'types', 'city');

        return $this->httpGet('v3/place/polygon', $params);
    }

    /**
     * ID查询
     *
     * @param $id
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function detail($id)
    {
        $params = compact('id');

        return $this->httpGet('v3/place/detail', $params);
    }
}
