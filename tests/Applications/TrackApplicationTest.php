<?php

namespace Chen\Amap\Tests\Applications;

use Chen\Amap\Factory;
use Chen\Amap\Tests\TestCase;
use Chen\Amap\Track\Application;
use RuntimeException;

class TrackApplicationTest extends TestCase
{
    /** @test */
    public function application()
    {
        $app = Factory::track($this->getConfig());
        $this->assertEquals('Chen\\Amap\\Track\\Application', get_class($app));
        return $app;
    }

    /**
     * @test
     * @depends application
     * @expectedException RuntimeException
     * @param $app
     */
    public function serviceCreate($app)
    {
        $app->service->create('foo');
    }

    /**
     * @test
     * @depends application
     * @expectedException RuntimeException
     * @param $app
     */
    public function serviceUpdate($app)
    {
        $app->service->update('foo', 'bar');
    }

    /**
     * @test
     * @depends application
     * @expectedException RuntimeException
     * @param Application $app
     */
    public function serviceSearch(Application $app)
    {
        $app->service->search();
    }

    /**
     * @test
     * @depends application
     * @expectedException RuntimeException
     * @param Application $app
     */
    public function serviceDelete(Application $app)
    {
        $app->service->delete('foo');
    }

    /**
     * @test
     * @depends application
     * @expectedException RuntimeException
     * @param Application $app
     */
    public function terminalSearchTxt(Application $app)
    {
        $app->terminal_search->text('foo', 'bar');
    }

    /**
     * @test
     * @depends application
     * @expectedException RuntimeException
     * @param Application $app
     */
    public function terminalSearchAround(Application $app)
    {
        $app->terminal_search->around('foo', '39.89491,116.322056');
    }


    /**
     * @test
     * @depends application
     * @expectedException RuntimeException
     * @param Application $app
     */
    public function terminalSearchPolygon(Application $app)
    {
        $app->terminal_search->polygon('foo', '116.298367,39.903931;116.354157,39.903009;116.356217,39.875745;116.282231,39.881936');
    }

    /**
     * @test
     * @depends application
     * @expectedException RuntimeException
     * @param Application $app
     */
    public function terminalSearchDistrict(Application $app)
    {
        $app->terminal_search->district('foo', '北京市');
    }

    /**
     * @test
     * @depends application
     * @expectedException RuntimeException
     * @param Application $app
     */
    public function terminalColumnCreate(Application $app)
    {
        $app->terminal_column->create('foo', 'foo', 'string');
    }

    /**
     * @test
     * @depends application
     * @expectedException RuntimeException
     * @param Application $app
     */
    public function terminalColumnUpdate(Application $app)
    {
        $app->terminal_column->update('foo', 'foo', 'bar');
    }

    /**
     * @test
     * @depends application
     * @expectedException RuntimeException
     * @param Application $app
     */
    public function terminalColumnSearch(Application $app)
    {
        $app->terminal_column->search('foo');
    }

    /**
     * @test
     * @depends application
     * @expectedException RuntimeException
     * @param Application $app
     */
    public function terminalColumnDelete(Application $app)
    {
        $app->terminal_column->delete('foo', 'bar');
    }

    /**
     * @test
     * @depends application
     * @expectedException RuntimeException
     * @param Application $app
     */
    public function terminalCreate(Application $app)
    {
        $app->terminal->create('foo', 'bar');
    }

    /**
     * @test
     * @depends application
     * @expectedException RuntimeException
     * @param Application $app
     */
    public function terminalUpdate(Application $app)
    {
        $app->terminal->update('foo', 'foo', 'bar');
    }

    /**
     * @test
     * @depends application
     * @expectedException RuntimeException
     * @param Application $app
     */
    public function terminalSearch(Application $app)
    {
        $app->terminal->search('foo');
    }

    /**
     * @test
     * @depends application
     * @expectedException RuntimeException
     * @param Application $app
     */
    public function terminalDelete(Application $app)
    {
        $app->terminal->delete('foo', 'foo');
    }

    /**
     * @test
     * @depends application
     * @expectedException RuntimeException
     * @param Application $app
     */
    public function traceCreate(Application $app)
    {
        $app->trace->create('foo', 'bar');
    }

    /**
     * @test
     * @depends application
     * @expectedException RuntimeException
     * @param Application $app
     */
    public function traceDelete(Application $app)
    {
        $app->trace->delete('foo', 'foo', 'bar');
    }

    /**
     * @test
     * @depends application
     * @expectedException RuntimeException
     * @param Application $app
     */
    public function tracePointUpload(Application $app)
    {
        // array( [errcode] => 20003 [errdetail] => 未知错误  [errmsg] => UNKNOWN_ERROR )
        $points = [["location" => "116.397428,39.90923", "locatetime" => 1544176895000, "speed" => 40, "direction" => 120, "height" => 39, "accuracy" => 20]];
        $app->trace->pointUpload('foo', 'foo', 'bar', $points);
    }

    /**
     * @test
     * @depends application
     * @expectedException RuntimeException
     * @param Application $app
     */
    public function terminalMonitorLastpoint(Application $app)
    {
        $app->terminal_monitor->lastpoint('foo', 'foo', 'bar');
    }

    /**
     * @test
     * @depends application
     * @expectedException RuntimeException
     * @param Application $app
     */
    public function grasproadSearch(Application $app)
    {
        $app->grasproad->search('foo', 'foo', 'bar');
    }
}
