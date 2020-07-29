<?php

namespace Chen\Amap\Track\Providers;

use Chen\Amap\Track\Clients\ServiceClient;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    /**
     * @param Container $app
     */
    public function register(Container $app)
    {
        $app['service'] = function ($app) {
            return new ServiceClient($app);
        };
    }
}
