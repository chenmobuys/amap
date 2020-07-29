<?php

namespace Chen\Amap\Track\Clients;

use Chen\Amap\Client;

class TraceColumnClient extends Client
{
    /**
     * 增加轨迹的自定义字段
     *
     * @param $sid
     * @param $column
     * @param $type
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function create($sid, $column, $type)
    {
        $params = compact('sid', 'column', 'type');

        return $this->httpPost('v1/track/point/column/add', $params);
    }

    /**
     * 修改轨迹的自定义字段
     *
     * @param $sid
     * @param $column
     * @param $newcolumn
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function update($sid, $column, $newcolumn)
    {
        $params = compact('sid', 'column', 'newcolumn');

        return $this->httpPost('v1/track/point/column/update', $params);
    }

    /**
     * 查询轨迹的自定义字段
     *
     * @param $sid
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function search($sid)
    {
        $params = compact('sid');

        return $this->httpGet('v1/track/point/column/list', $params);
    }

    /**
     * 删除轨迹的自定义字段
     *
     * @param $sid
     * @param $column
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function delete($sid, $column)
    {
        $params = compact('sid', 'column');

        return $this->httpPost('v1/track/point/column/delete', $params);
    }
}
