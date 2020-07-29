<?php

namespace Chen\Amap\Tests;

use Mockery;
use PHPUnit\Framework\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    public function getConfig()
    {
        return ['key' => 'xxxxxxxxxx'];
    }

    protected function assertV3Response($response)
    {
        $this->assertTrue(is_array($response));
        $this->assertArrayHasKey('status', $response);
        $this->assertNotEquals(1, $response['status']);
    }

    protected function assertV4Response($response)
    {
        $this->assertTrue(is_array($response));
        $this->assertArrayHasKey('errcode', $response);
        $this->assertNotEquals(0, $response['errcode']);
    }

    protected function assertV1Response($response)
    {
        $this->assertTrue(is_array($response));
        $this->assertArrayHasKey('errcode', $response);
        $this->assertNotEquals(10000, $response['errcode']);
    }
}
