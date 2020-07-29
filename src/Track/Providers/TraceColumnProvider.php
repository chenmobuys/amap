<?php

namespace Chen\Amap\Track\Providers;

use Chen\Amap\Track\Clients\TraceColumnClient;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class TraceColumnProvider implements ServiceProviderInterface
{
    /**
     * @param Container $app
     */
    public function register(Container $app)
    {
        $app['trace_column'] = function ($app) {
            return new TraceColumnClient($app);
        };
    }
}
