<?php

namespace Chen\Amap\Webservice\Providers;

use Chen\Amap\Webservice\Clients\SearchClient;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class SearchProvider implements ServiceProviderInterface
{
    /**
     * @param Container $app
     */
    public function register(Container $app)
    {
        $app['search'] = function ($app) {
            return new SearchClient($app);
        };
    }
}
