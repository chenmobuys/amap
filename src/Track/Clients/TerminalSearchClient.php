<?php

namespace Chen\Amap\Track\Clients;

use Chen\Amap\Kernel\Client;

/**
 * Class TerminalSearchClient
 * @package Chen\Amap\Track\Clients
 */
class TerminalSearchClient extends Client
{

    /**
     * 关键字搜索终端
     *
     * @param $sid
     * @param $keywords
     * @param int $page
     * @param int $pagesize
     * @param null $filter
     * @param null $sortrule
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function text($sid, $keywords, $page = 1, $pagesize = 50, $filter = null, $sortrule = null)
    {
        $params = compact('sid', 'keywords', 'page', 'pagesize', 'filter', 'sortrule');

        return $this->httpPost('v1/track/terminal/search', $params);
    }

    /**
     * 周边搜索终端
     *
     * @param $sid
     * @param $center
     * @param int $radius
     * @param int $page
     * @param int $pagesize
     * @param null $filter
     * @param null $sortrule
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function around($sid, $center, $radius = 500, $page = 1, $pagesize = 50, $filter = null, $sortrule = null)
    {
        $params = compact('sid', 'center', 'radius', 'page', 'pagesize', 'filter', 'sortrule');

        return $this->httpPost('v1/track/terminal/aroundsearch', $params);
    }

    /**
     * 多边形区域内搜索终端
     *
     * @param $sid
     * @param $polygon
     * @param int $page
     * @param int $pagesize
     * @param null $filter
     * @param null $sortrule
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function polygon($sid, $polygon, $page = 1, $pagesize = 50, $filter = null, $sortrule = null)
    {
        $params = compact('sid', 'polygon', 'page', 'pagesize', 'filter', 'sortrule');

        return $this->httpPost('v1/track/terminal/polygonsearch', $params);
    }

    /**
     * 行政区域内搜索终端
     *
     * @param $sid
     * @param $keywords
     * @param int $page
     * @param int $pagesize
     * @param null $filter
     * @param null $sortrule
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function district($sid, $keywords, $page = 1, $pagesize = 50, $filter = null, $sortrule = null)
    {
        $params = compact('sid', 'keywords', 'page', 'pagesize', 'filter', 'sortrule');

        return $this->httpPost('v1/track/terminal/districtsearch', $params);
    }
}
