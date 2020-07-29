<?php

namespace Chen\Amap\Track\Clients;

use Chen\Amap\Client;

class GrasproadClient extends Client
{
    /**
     * 轨迹纠偏及里程查询
     *
     * @param $sid
     * @param $tid
     * @param $trid
     * @param null $starttime
     * @param null $endtime
     * @param null $correction
     * @param null $recoup
     * @param null $gap
     * @param null $ispoints
     * @param null $page
     * @param null $pagesize
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function search($sid, $tid, $trid, $starttime = null, $endtime = null, $correction = null, $recoup = null, $gap = null, $ispoints = null, $page = null, $pagesize = null)
    {
        $params = compact('sid', 'tid', 'trid', 'starttime', 'endtime', 'correction', 'recoup', 'gap', 'ispoints', 'page', 'pagesize');

        return $this->httpGet('v1/track/terminal/trsearch', $params);
    }
}
