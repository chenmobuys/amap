<?php

namespace Chen\Amap\Track\Providers;

use Chen\Amap\Track\Clients\TraceClient;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class TraceProvider implements ServiceProviderInterface
{
    /**
     * @param Container $app
     */
    public function register(Container $app)
    {
        $app['trace'] = function ($app) {
            return new TraceClient($app);
        };
    }
}
