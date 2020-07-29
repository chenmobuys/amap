<?php

namespace Chen\Amap\Tests\Applications;

use Chen\Amap\Factory;
use Chen\Amap\Tests\TestCase;
use Chen\Amap\Webservice\Application;
use RuntimeException;

class WebserviceApplicationTest extends TestCase
{
    /** @test */
    public function application()
    {
        $app = Factory::webservice($this->getConfig());
        $this->assertEquals('Chen\\Amap\\Webservice\\Application', get_class($app));
        return $app;
    }

    /**
     * @test
     * @depends application
     * @expectedException RuntimeException
     * @param Application $app
     */
    public function baseDistrict(Application $app)
    {
        $app->base->district(1, 1, 20, 'base', '北京市');
    }

    /**
     * @test
     * @depends application
     * @expectedException RuntimeException
     * @param Application $app
     */
    public function baseInputips(Application $app)
    {
        $app->base->inputtips('北京市');
    }

    /**
     * @test
     * @depends application
     * @expectedException RuntimeException
     * @param Application $app
     */
    public function baseConvert(Application $app)
    {
        $app->base->convert('116.322056,39.89491');
    }


    /**
     * @test
     * @depends application
     * @expectedException RuntimeException
     * @param Application $app
     */
    public function baseIp(Application $app)
    {
        $app->base->ip('127.0.0.1');
    }

    /**
     * @test
     * @depends application
     * @expectedException RuntimeException
     * @param Application $app
     */
    public function directionWalking(Application $app)
    {
        $app->direction->walking('116.322056,39.89491', '116.426769,39.902219');
    }

    /**
     * @test
     * @depends application
     * @expectedException RuntimeException
     * @param Application $app
     */
    public function directionTransit(Application $app)
    {
        $app->direction->transit('116.322056,39.89491', '116.426769,39.902219', '北京市');
    }

    /**
     * @test
     * @depends application
     * @expectedException RuntimeException
     * @param Application $app
     */
    public function directionDriving(Application $app)
    {
        $app->direction->driving('116.322056,39.89491', '116.426769,39.902219');
    }

    /**
     * @test
     * @depends application
     * @expectedException RuntimeException
     * @param Application $app
     */
    public function directionBicycling(Application $app)
    {
        $app->direction->bicycling('116.322056,39.89491', '116.426769,39.902219');
    }

    /**
     * @test
     * @depends application
     * @expectedException RuntimeException
     * @param Application $app
     */
    public function directionTrunck(Application $app)
    {
        $app->direction->truck('116.322056,39.89491', '116.426769,39.902219', 1);
    }

    /**
     * @test
     * @depends application
     * @expectedException RuntimeException
     * @param Application $app
     */
    public function directionDistance(Application $app)
    {
        $app->direction->distance('116.322056,39.89491', '116.426769,39.902219', 1);
    }


    /**
     * @test
     * @depends application
     * @expectedException RuntimeException
     * @param Application $app
     */
    public function geocodeGeo(Application $app)
    {
        $app->geocode->geo('北京市');
    }

    /**
     * @test
     * @depends application
     * @expectedException RuntimeException
     * @param Application $app
     */
    public function geocodeRegeo(Application $app)
    {
        $app->geocode->regeo('116.407526,39.904030');

    }

    /**
     * @test
     * @depends application
     * @expectedException RuntimeException
     * @param Application $app
     */
    public function geofenceCreate(Application $app)
    {
        $app->geofence->create('北京市', '116.407526,39.904030', 5000, null, null, 'Mon');
    }

    /**
     * @test
     * @depends application
     * @expectedException RuntimeException
     * @param Application $app
     */
    public function geofenceSearch(Application $app)
    {
        $app->geofence->search();
    }

    /**
     * @test
     * @depends application
     * @expectedException RuntimeException
     * @param Application $app
     */
    public function genfenceUpdate(Application $app)
    {
        $app->geofence->update('foo', '北京市测试', '116.407526,39.904030', 5000, null, null, 'Mon');
    }

    /**
     * @test
     * @depends application
     * @expectedException RuntimeException
     * @param Application $app
     */
    public function geofenceEnable(Application $app)
    {
        $app->geofence->enable('foo');
    }

    /**
     * @test
     * @depends application
     * @expectedException RuntimeException
     * @param Application $app
     */
    public function geofenceStatus(Application $app)
    {
        $app->geofence->status('XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX', '116.407526,39.904030,1577808000');
    }

    /**
     * @test
     * @depends application
     * @expectedException RuntimeException
     * @param Application $app
     */
    public function geofenceDelete(Application $app)
    {
        // 未知错误
        $app->geofence->delete('foo');
    }


    /**
     * @test
     * @depends application
     * @expectedException RuntimeException
     * @param Application $app
     */
    public function grasproadDriving(Application $app)
    {
        $params = [
            ["x" => 116.449429, "y" => 40.014844, "sp" => 4, "ag" => 110, "tm" => 1478831753],
            ["x" => 116.449639, "y" => 40.014776, "sp" => 3, "ag" => 110, "tm" => 23],
            ["x" => 116.449859, "y" => 40.014716, "sp" => 3, "ag" => 111, "tm" => 33],
            ["x" => 116.450074, "y" => 40.014658, "sp" => 3, "ag" => 110, "tm" => 31],
            ["x" => 116.450273, "y" => 40.014598, "sp" => 3, "ag" => 111, "tm" => 20]
        ];

        $app->grasproad->driving($params);

    }

    /**
     * @test
     * @depends application
     * @expectedException RuntimeException
     * @param Application $app
     */
    public function searchText(Application $app)
    {
        $app->search->text('北京市');
    }

    /**
     * @test
     * @depends application
     * @expectedException RuntimeException
     * @param Application $app
     */
    public function searchAround(Application $app)
    {
        $app->search->around('116.322056,39.89491', '大学');
    }

    /**
     * @test
     * @depends application
     * @expectedException RuntimeException
     * @param Application $app
     */
    public function searchPolygon(Application $app)
    {
        // 未知错误
        $app->search->polygon('116.322056,39.89491');
    }

    /**
     * @test
     * @depends application
     * @expectedException RuntimeException
     * @param Application $app
     */
    public function searchDetail(Application $app)
    {
        $app->search->detail('B0FFFAB6J2');
    }


    /**
     * @test
     * @depends application
     * @expectedException RuntimeException
     * @param Application $app
     */
    public function weatherWeatherInfo(Application $app)
    {
        $app->weather->weatherInfo('北京市');
    }
}
