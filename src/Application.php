<?php

namespace Chen\Amap;

use Pimple\Container;

/**
 * Class Application
 * @package Chen\Amap\Kernel
 */
abstract class Application extends Container
{
    /**
     * @var array
     */
    protected $providers = [];

    /**
     * @var array
     */
    protected $defaultConfig = [];

    /**
     * @var array
     */
    protected $userConfig = [];

    /**
     * @var
     */
    protected $baseUri;

    /**
     * Application constructor.
     * @param array $config
     * @param array $prepends
     */
    public function __construct($config = [], $prepends = [])
    {
        $this->registerProviders($this->getProviders());

        parent::__construct($prepends);

        $this->userConfig = $config;
    }

    /**
     * @param $name
     * @param null $default
     * @return |null
     */
    public function getConfig($name, $default = null)
    {
        $base = [
            // http://docs.guzzlephp.org/en/stable/request-options.html
            'http' => [
                'timeout' => 5.0,
                'base_uri' => $this->baseUri,
                'curl' => [
                    CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
                ]
            ],
            // 秘钥
            'key' => '',
            // 数字签名
            'sig' => '',
        ];

        $config = array_replace_recursive($base, $this->defaultConfig, $this->userConfig);

        return isset($config[$name]) ? $config[$name] : $default;
    }

    /**
     * Return all providers.
     *
     * @return array
     */
    public function getProviders()
    {
        return $this->providers;
    }

    /**
     * Magic get access.
     *
     * @param string $id
     *
     * @return mixed
     */
    public function __get($id)
    {
        return $this->offsetGet($id);
    }

    /**
     * Magic set access.
     *
     * @param string $id
     * @param mixed $value
     */
    public function __set($id, $value)
    {
        $this->offsetSet($id, $value);
    }

    /**
     * @param array $providers
     */
    public function registerProviders(array $providers)
    {
        foreach ($providers as $provider) {
            parent::register(new $provider());
        }
    }
}
