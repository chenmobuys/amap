<?php

namespace Chen\Amap\Webservice\Providers;

use Chen\Amap\Webservice\Clients\BaseClient;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class BaseProvider implements ServiceProviderInterface
{
    /**
     * @param Container $app
     */
    public function register(Container $app)
    {
        $app['base'] = function ($app) {
            return new BaseClient($app);
        };
    }
}
