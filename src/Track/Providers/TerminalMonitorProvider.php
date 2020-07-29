<?php

namespace Chen\Amap\Track\Providers;

use Chen\Amap\Track\Clients\TerminalMonitorClient;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class TerminalMonitorProvider implements ServiceProviderInterface
{
    /**
     * @param Container $app
     */
    public function register(Container $app)
    {
        $app['terminal_monitor'] = function ($app) {
            return new TerminalMonitorClient($app);
        };
    }
}
