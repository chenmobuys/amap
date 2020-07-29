<?php

namespace Chen\Amap\Track\Providers;

use Chen\Amap\Track\Clients\TerminalSearchClient;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class TerminalSearchProvider implements ServiceProviderInterface
{
    /**
     * @param Container $app
     */
    public function register(Container $app)
    {
        $app['terminal_search'] = function ($app) {
            return new TerminalSearchClient($app);
        };
    }
}
