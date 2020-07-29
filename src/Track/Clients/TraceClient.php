<?php

namespace Chen\Amap\Track\Clients;

use Chen\Amap\Kernel\Client;

/**
 * Class TraceClient
 * @package Chen\Amap\Track\Clients
 */
class TraceClient extends Client
{
    /**
     * 创建轨迹
     *
     * @param $sid
     * @param $tid
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function create($sid, $tid)
    {
        $params = compact('sid', 'tid');

        return $this->httpPost('v1/track/trace/add', $params);
    }

    /**
     * 删除轨迹
     *
     * @param $sid
     * @param $tid
     * @param $trid
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function delete($sid, $tid, $trid)
    {
        $params = compact('sid', 'tid', 'trid');

        return $this->httpPost('v1/track/trace/delete', $params);
    }

    /**
     * 轨迹点上传（单点、批量）
     *
     * @param $sid
     * @param $tid
     * @param $trid
     * @param $points
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function pointUpload($sid, $tid, $trid, $points)
    {
        $params = compact('sid', 'tid', 'trid', 'points');

        return $this->httpPost('v1/track/point/upload', $params);
    }
}
