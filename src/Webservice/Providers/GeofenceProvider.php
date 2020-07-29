<?php

namespace Chen\Amap\Webservice\Providers;

use Chen\Amap\Webservice\Clients\GeofenceClient;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class GeofenceProvider implements ServiceProviderInterface
{
    /**
     * @param Container $app
     */
    public function register(Container $app)
    {
        $app['geofence'] = function ($app) {
            return new GeofenceClient($app);
        };
    }
}
