<?php

namespace Chen\Amap\Webservice\Providers;

use Chen\Amap\Webservice\Clients\GrasproadClient;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class GrasproadProvider implements ServiceProviderInterface
{
    /**
     * @param Container $app
     */
    public function register(Container $app)
    {
        $app['grasproad'] = function ($app) {
            return new GrasproadClient($app);
        };
    }
}
