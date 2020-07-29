<?php

namespace Chen\Amap\Track;

use Chen\Amap\Application as BaseApplication;

/**
 * Class Application
 *
 * @property \Chen\Amap\Track\Clients\GrasproadClient $grasproad
 * @property \Chen\Amap\Track\Clients\ServiceClient $service
 * @property \Chen\Amap\Track\Clients\TerminalClient $terminal
 * @property \Chen\Amap\Track\Clients\TerminalColumnClient $terminal_column
 * @property \Chen\Amap\Track\Clients\TerminalMonitorClient $terminal_monitor
 * @property \Chen\Amap\Track\Clients\TerminalSearchClient $terminal_search
 * @property \Chen\Amap\Track\Clients\TraceClient $trace
 * @property \Chen\Amap\Track\Clients\TraceColumnClient $trace_column
 *
 * @package Chen\Amap\Track
 */
class Application extends BaseApplication
{
    /**
     * @var string
     */
    protected $baseUri = 'https://tsapi.amap.com/';

    /**
     * @var array
     */
    protected $providers = [
        Providers\GrasproadProvider::class,
        Providers\ServiceProvider::class,
        Providers\TerminalColumnProvider::class,
        Providers\TerminalMonitorProvider::class,
        Providers\TerminalProvider::class,
        Providers\TerminalSearchProvider::class,
        Providers\TraceColumnProvider::class,
        Providers\TraceProvider::class,
    ];
}
