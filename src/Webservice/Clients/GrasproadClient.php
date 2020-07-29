<?php

namespace Chen\Amap\Webservice\Clients;

use Chen\Amap\Kernel\Client;

class GrasproadClient extends Client
{
    public function driving($params)
    {
        return $this->httpPostJson('v4/grasproad/driving', $params);
    }
}
