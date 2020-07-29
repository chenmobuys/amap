<?php

namespace Chen\Amap\Track\Clients;

use Chen\Amap\Kernel\Client;

/**
 * Class TerminalColumnClient
 * @package Chen\Amap\Track\Clients
 */
class TerminalColumnClient extends Client
{
    /**
     * 增加终端的自定义字段
     *
     * @param $sid
     * @param $column
     * @param $type
     * @param string $list
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function create($sid, $column, $type, $list = 'n')
    {
        $params = compact('sid', 'column', 'type', 'list');

        return $this->httpPost('v1/track/terminal/column/add', $params);
    }

    /**
     * 修改终端的自定义字段
     *
     * @param $sid
     * @param $column
     * @param $newcolumn
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function update($sid, $column, $newcolumn)
    {
        $params = compact('sid', 'column', 'newcolumn');

        return $this->httpPost('v1/track/terminal/column/update', $params);
    }

    /**
     * 查询终端的自定义字段
     *
     * @param $sid
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function search($sid)
    {
        $params = compact('sid');

        return $this->httpGet('v1/track/terminal/column/list', $params);
    }

    /**
     * 删除终端的自定义字段
     *
     * @param $sid
     * @param $column
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function delete($sid, $column)
    {
        $params = compact('sid', 'column');

        return $this->httpPost('v1/track/terminal/column/delete', $params);
    }
}
