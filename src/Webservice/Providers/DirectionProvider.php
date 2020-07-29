<?php

namespace Chen\Amap\Webservice\Providers;

use Chen\Amap\Webservice\Clients\DirectionClient;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class DirectionProvider implements ServiceProviderInterface
{
    /**
     * @param Container $app
     */
    public function register(Container $app)
    {
        $app['direction'] = function ($app) {
            return new DirectionClient($app);
        };
    }
}
