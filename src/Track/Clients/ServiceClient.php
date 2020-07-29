<?php

namespace Chen\Amap\Track\Clients;

use Chen\Amap\Kernel\Client;

/**
 * Class ServiceClient
 * @package Chen\Amap\Track\Clients
 */
class ServiceClient extends Client
{

    /**
     * 创建服务
     *
     * @param $name
     * @param null $desc
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function create($name, $desc = null)
    {
        $params = compact('name', 'desc');

        return $this->httpPost('v1/track/service/add', $params);
    }

    /**
     * 修改服务
     *
     * @param $sid
     * @param null $name
     * @param null $desc
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function update($sid, $name = null, $desc = null)
    {
        $params = compact('sid', 'name', 'desc');

        return $this->httpPost('v1/track/service/update', $params);
    }

    /**
     * 查询服务
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function search()
    {
        return $this->httpGet('v1/track/service/list');
    }

    /**
     * 删除服务
     *
     * @param $sid
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function delete($sid)
    {
        $params = compact('sid');

        return $this->httpPost('v1/track/service/delete', $params);
    }
}
