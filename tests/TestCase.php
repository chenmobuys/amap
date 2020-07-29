<?php

namespace Chen\Amap\Tests;

use Mockery;
use PHPUnit\Framework\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    public function getConfig()
    {
        return ['key' => getenv('key')];
    }

    protected function assertV3Response($response)
    {
        $this->assertTrue(is_array($response));
        $this->assertArrayHasKey('status', $response);
        $this->assertEquals(1, $response['status']);
    }

    protected function assertV4Response($response)
    {
        $this->assertTrue(is_array($response));
        $this->assertArrayHasKey('errcode', $response);
        $this->assertEquals(0, $response['errcode']);
    }

    protected function assertV1Response($response)
    {
        $this->assertTrue(is_array($response));
        $this->assertArrayHasKey('errcode', $response);
        $this->assertEquals(10000, $response['errcode']);
    }
}
