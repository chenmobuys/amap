<?php

namespace Chen\Amap\Webservice\Providers;

use Chen\Amap\Webservice\Clients\WeatherClient;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class WeatherProvider implements ServiceProviderInterface
{
    /**
     * @param Container $app
     */
    public function register(Container $app)
    {
        $app['weather'] = function ($app) {
            return new WeatherClient($app);
        };
    }
}
