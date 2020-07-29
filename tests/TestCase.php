<?php

namespace Chen\Amap\Tests;

use Mockery;
use PHPUnit\Framework\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    public function getConfig()
    {
        return ['key' => 'xxxxxxxxxx', 'http' => ['timeout' => 10.0]];
    }
}
