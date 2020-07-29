<?php

namespace Chen\Amap\Track\Providers;

use Chen\Amap\Track\Clients\TerminalClient;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class TerminalProvider implements ServiceProviderInterface
{
    /**
     * @param Container $app
     */
    public function register(Container $app)
    {
        $app['terminal'] = function ($app) {
            return new TerminalClient($app);
        };
    }
}
