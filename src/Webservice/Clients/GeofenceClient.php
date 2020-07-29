<?php

namespace Chen\Amap\Webservice\Clients;

use Chen\Amap\Kernel\Client;

class GeofenceClient extends Client
{
    /**
     * 创建围栏
     *
     * @param $name
     * @param null $center
     * @param null $radius
     * @param null $points
     * @param null $valid_time
     * @param null $repeat
     * @param null $fixed_date
     * @param null $time
     * @param null $desc
     * @param null $alert_condition
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function create(
        $name, $center = null, $radius = null, $points = null, $valid_time = null, $repeat = null,
        $fixed_date = null, $time = null, $desc = null, $alert_condition = null
    )
    {
        $params = compact('name', 'center', 'radius', 'points', 'valid_time', 'repeat', 'fixed_date', 'time', 'desc', 'alert_condition');

        return $this->httpPostJson('v4/geofence/meta', $params);
    }

    /**
     * 查询围栏
     *
     * @param null $id
     * @param null $gid
     * @param null $name
     * @param int $page_no
     * @param int $page_size
     * @param null $enable
     * @param null $start_time
     * @param null $end_time
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function search($id = null, $gid = null, $name = null, $page_no = 1, $page_size = 20, $enable = null, $start_time = null, $end_time = null)
    {
        $params = compact('id', 'gid', 'name', 'page_no', 'page_size', 'enable', 'start_time', 'end_time');

        return $this->httpGet('v4/geofence/meta', $params);
    }

    /**
     * 更新围栏
     *
     * @param $gid
     * @param $name
     * @param null $center
     * @param null $radius
     * @param null $points
     * @param null $valid_time
     * @param null $repeat
     * @param null $fixed_date
     * @param null $time
     * @param null $desc
     * @param null $alert_condition
     * @param string $method
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function update(
        $gid, $name, $center = null, $radius = null, $points = null, $valid_time = null, $repeat = null,
        $fixed_date = null, $time = null, $desc = null, $alert_condition = null
    )
    {
        $params = compact('name', 'center', 'radius', 'points', 'valid_time', 'repeat', 'fixed_date', 'time', 'desc', 'alert_condition');
        $query = compact('gid');

        return $this->httpPatchJson('v4/geofence/meta', $params, $query);
    }

    /**
     * 删除围栏
     *
     * @param $gid
     * @param string $method
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function delete($gid)
    {
        $query = compact('gid');

        return $this->httpDelete('v4/geofence/meta', $query);
    }

    /**
     * 围栏启动&停止
     *
     * @param $gid
     * @param bool $enable
     * @param string $method
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function enable($gid, $enable = true, $method = 'patch')
    {
        $params = compact('enable');
        $query = compact('gid', 'method');

        return $this->httpPostJson('v4/geofence/meta', $params, $query);
    }

    /**
     * 围栏设备监控
     *
     * @param $locations
     * @param $diu
     * @param null $uid
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function status($diu, $locations, $uid = null)
    {
        $params = compact('locations', 'diu', 'uid');

        return $this->httpGet('v4/geofence/status', $params);
    }
}
