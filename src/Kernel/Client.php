<?php


namespace Chen\Amap\Kernel;

use Chen\Amap\Kernel\Application;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Client as HttpClient;
use Psr\Http\Message\ResponseInterface;

class Client
{
    /**
     * @var Application
     */
    protected $app;

    /**
     * @var HttpClient
     */
    protected $httpClient;

    /**
     * @var
     */
    protected $baseUri;

    /**
     * Client constructor.
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * @param $url
     * @param array $query
     * @return ResponseInterface
     */
    public function httpGet($url, $query = [])
    {
        return $this->request($url, 'GET', ['query' => array_filter($query)]);
    }

    /**
     * @param $url
     * @param array $data
     * @return ResponseInterface
     */
    public function httpPost($url, $data = [])
    {
        return $this->request($url, 'POST', ['query' => [], 'form_params' => array_filter($data)]);
    }

    /**
     * @param $url
     * @param array $data
     * @param array $query
     * @return ResponseInterface
     */
    public function httpPostJson($url, $data = [], $query = [])
    {
        return $this->request($url, 'POST', ['query' => array_filter($query), 'json' => array_filter($data)]);
    }

    /**
     * @param $url
     * @param array $data
     * @param array $query
     * @return mixed
     */
    public function httpPatchJson($url, $data = [], $query = [])
    {
        return $this->request($url, 'PATCH', ['query' => array_filter($query), 'json' => array_filter($data)]);
    }

    /**
     * @param $url
     * @param array $query
     * @return mixed
     */
    public function httpDelete($url, $query = [])
    {
        return $this->request($url, 'POST', ['query' => array_filter($query)]);
    }

    /**
     * Set GuzzleHttp\Client.
     *
     * @param \GuzzleHttp\ClientInterface $httpClient
     *
     * @return $this
     */
    public function setHttpClient(ClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;

        return $this;
    }

    public function getHttpClient()
    {
        if (!($this->httpClient instanceof ClientInterface)) {
            $this->httpClient = new HttpClient();
        }

        return $this->httpClient;
    }

    /**
     * @param $url
     * @param string $method
     * @param array $options
     * @return mixed
     */
    public function request($url, $method = 'GET', $options = [])
    {
        $method = strtoupper($method);

        $options = array_merge($this->getRequestDefaultOptions(), $options);

        $options['query']['key'] = $this->app->getConfig('key');

        $response = $this->getHttpClient()->request($method, $url, $options);

        $content = (array)json_decode($response->getBody()->getContents(), true);

        if (strpos($url, 'v1') && isset($content['errcode']) && $content['errcode'] != 10000) {

            throw new \RuntimeException($content['errmsg'] . ':' . $content['errdetail'], $content['errcode']);

        } elseif (strpos($url, 'v3') && isset($content['status']) && $content['status'] != 1) {

            throw new \RuntimeException($content['info'], $content['status']);

        } elseif (strpos($url, 'v4') && isset($content['errcode']) && $content['errcode'] != 0) {

            throw new \RuntimeException($content['errmsg'] . ':' . $content['errdetail'], $content['errcode']);

        } elseif ($content == '') {

            throw new \RuntimeException('Content is empty');
            
        }

        return $content;
    }

    /**
     * @return array
     */
    protected function getRequestDefaultOptions()
    {
        return $this->app->getConfig('http');
    }
}
