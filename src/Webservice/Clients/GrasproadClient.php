<?php

namespace Chen\Amap\Webservice\Clients;

use Chen\Amap\Client;

class GrasproadClient extends Client
{
    public function driving($params)
    {
        return $this->httpPostJson('v4/grasproad/driving', $params);
    }
}
