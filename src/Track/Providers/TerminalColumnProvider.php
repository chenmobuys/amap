<?php

namespace Chen\Amap\Track\Providers;

use Chen\Amap\Track\Clients\TerminalColumnClient;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class TerminalColumnProvider implements ServiceProviderInterface
{
    /**
     * @param Container $app
     */
    public function register(Container $app)
    {
        $app['terminal_column'] = function ($app) {
            return new TerminalColumnClient($app);
        };
    }
}
