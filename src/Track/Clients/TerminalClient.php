<?php

namespace Chen\Amap\Track\Clients;

use Chen\Amap\Client;

/**
 * Class TerminalClient
 * @package Chen\Amap\Track\Clients
 */
class TerminalClient extends Client
{

    /**
     * 创建终端
     *
     * @param $sid
     * @param $name
     * @param null $desc
     * @param null $props
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function create($sid, $name, $desc = null, $props = null)
    {
        $params = compact('sid', 'name', 'desc', 'props');

        return $this->httpPost('v1/track/terminal/add', $params);
    }

    /**
     * 修改终端
     *
     * @param $sid
     * @param $tid
     * @param null $name
     * @param null $desc
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function update($sid, $tid, $name = null, $desc = null)
    {
        $params = compact('sid', 'tid', 'name', 'desc');

        return $this->httpPost('v1/track/terminal/update', $params);
    }

    /**
     * 查询终端
     *
     * @param $sid
     * @param null $tid
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function search($sid, $tid = null)
    {
        $params = compact('sid', 'tid');

        return $this->httpGet('v1/track/terminal/list', $params);
    }

    /**
     * 删除终端
     *
     * @param $sid
     * @param $tid
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function delete($sid, $tid)
    {
        $params = compact('sid', 'tid');

        return $this->httpPost('v1/track/terminal/delete', $params);
    }
}
