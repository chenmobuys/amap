<?php

namespace Chen\Amap;

/**
 * Class Factory
 *
 * @method static \Chen\Amap\Webservice\Application webservice($config)
 * @method static \Chen\Amap\Track\Application track($config)
 *
 * @package Chen\Amap
 */
class Factory
{
    /**
     * @param string $name
     * @param array $config
     *
     * @return \Chen\Amap\Kernel\Application
     */
    public static function make($name, array $config)
    {
        $namespace = ucwords(str_replace(['-', '_'], ' ', $name));
        $application = "\\Chen\\Amap\\{$namespace}\\Application";

        return new $application($config);
    }

    /**
     * Dynamically pass methods to the application.
     *
     * @param string $name
     * @param array  $arguments
     *
     * @return mixed
     */
    public static function __callStatic($name, $arguments)
    {
        return self::make($name, ...$arguments);
    }
}
