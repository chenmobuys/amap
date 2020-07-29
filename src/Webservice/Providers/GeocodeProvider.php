<?php

namespace Chen\Amap\Webservice\Providers;

use Chen\Amap\Webservice\Clients\GeocodeClient;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class GeocodeProvider implements ServiceProviderInterface
{
    /**
     * @param Container $app
     */
    public function register(Container $app)
    {
        $app['geocode'] = function ($app) {
            return new GeocodeClient($app);
        };
    }
}
