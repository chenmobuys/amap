<?php

namespace Chen\Amap\Track\Clients;

use Chen\Amap\Kernel\Client;

class TerminalMonitorClient extends Client
{
    public function lastpoint($sid, $tid, $trid, $correction = null)
    {
        $params = compact('sid', 'tid', 'trid', 'correction');

        return $this->httpGet('v1/track/terminal/lastpoint', $params);
    }

}
