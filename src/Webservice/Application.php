<?php


namespace Chen\Amap\Webservice;

use Chen\Amap\Application as BaseApplication;

/**
 * Class Application
 *
 * @property \Chen\Amap\Webservice\Clients\BaseClient $base
 * @property \Chen\Amap\Webservice\Clients\DirectionClient $direction
 * @property \Chen\Amap\Webservice\Clients\GeocodeClient $geocode
 * @property \Chen\Amap\Webservice\Clients\GeofenceClient $geofence
 * @property \Chen\Amap\Webservice\Clients\GrasproadClient $grasproad
 * @property \Chen\Amap\Webservice\Clients\SearchClient $search
 * @property \Chen\Amap\Webservice\Clients\WeatherClient $weather
 *
 * @package Chen\Amap\Webservice
 */
class Application extends BaseApplication
{
    protected $baseUri = 'https://restapi.amap.com/';

    protected $providers = [
        Providers\BaseProvider::class,
        Providers\DirectionProvider::class,
        Providers\GeocodeProvider::class,
        Providers\GeofenceProvider::class,
        Providers\GrasproadProvider::class,
        Providers\SearchProvider::class,
        Providers\WeatherProvider::class,
    ];
}
