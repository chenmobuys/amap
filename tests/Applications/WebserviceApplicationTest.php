<?php

namespace Chen\Amap\Tests\Applications;

use Chen\Amap\Factory;
use Chen\Amap\Tests\TestCase;
use Chen\Amap\Webservice\Application;

class WebserviceApplicationTest extends TestCase
{
    /** @test */
    public function makeWebServiceApplication()
    {
        $app = Factory::webservice($this->getConfig());
        $this->assertEquals('Chen\\Amap\\Webservice\\Application', get_class($app));
        return $app;
    }

    /**
     * @test
     * @depends makeWebServiceApplication
     * @param Application $app
     */
    public function base_client(Application $app)
    {
        $response = $app->base->district(1, 1, 20, 'base', '北京市');
        $this->assertV3Response($response);

        $response = $app->base->inputtips('北京市');
        $this->assertV3Response($response);

        $response = $app->base->convert('116.322056,39.89491');
        $this->assertV3Response($response);

        $response = $app->base->ip('127.0.0.1');
        $this->assertV3Response($response);
    }

    /**
     * @test
     * @depends makeWebServiceApplication
     * @param Application $app
     */
    public function direction_client(Application $app)
    {
        $response = $app->direction->walking('116.322056,39.89491', '116.426769,39.902219');
        $this->assertV3Response($response);

        $response = $app->direction->transit('116.322056,39.89491', '116.426769,39.902219', '北京市');
        $this->assertV3Response($response);

        $response = $app->direction->driving('116.322056,39.89491', '116.426769,39.902219');
        $this->assertV3Response($response);

        $response = $app->direction->bicycling('116.322056,39.89491', '116.426769,39.902219');
        $this->assertV4Response($response);

        $response = $app->direction->truck('116.322056,39.89491', '116.426769,39.902219', 1);
        $this->assertV4Response($response);

        $response = $app->direction->distance('116.322056,39.89491', '116.426769,39.902219', 1);
        $this->assertV3Response($response);
    }

    /**
     * @test
     * @depends makeWebServiceApplication
     * @param Application $app
     */
    public function geocode_client(Application $app)
    {
        $response = $app->geocode->geo('北京市');
        $this->assertV3Response($response);

        $response = $app->geocode->regeo('116.407526,39.904030');
        $this->assertV3Response($response);
    }

    /**
     * @param Application $app
     */
    public function geofence_client(Application $app)
    {
        $response = $app->geofence->create('北京市', '116.407526,39.904030', 5000, null, null, 'Mon');
        $this->assertV4Response($response);
        $gid = $response['data']['gid'];

        $response = $app->geofence->search();
        $this->assertV4Response($response);

        $response = $app->geofence->update($gid, '北京市测试', '116.407526,39.904030', 5000, null, null, 'Mon');
        $this->assertV4Response($response);

        $response = $app->geofence->enable($gid);
        $this->assertV4Response($response);

        $response = $app->geofence->status('XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX', '116.407526,39.904030,1577808000');
        $this->assertV4Response($response);

        // 未知错误
        $response = $app->geofence->delete($gid);
        $this->assertV4Response($response);
    }

    /**
     * @test
     * @depends makeWebServiceApplication
     * @param Application $app
     */
    public function grasproad_client(Application $app)
    {
        $params = [
            ["x" => 116.449429, "y" => 40.014844, "sp" => 4, "ag" => 110, "tm" => 1478831753],
            ["x" => 116.449639, "y" => 40.014776, "sp" => 3, "ag" => 110, "tm" => 23],
            ["x" => 116.449859, "y" => 40.014716, "sp" => 3, "ag" => 111, "tm" => 33],
            ["x" => 116.450074, "y" => 40.014658, "sp" => 3, "ag" => 110, "tm" => 31],
            ["x" => 116.450273, "y" => 40.014598, "sp" => 3, "ag" => 111, "tm" => 20]
        ];

        $response = $app->grasproad->driving($params);
        $this->assertV4Response($response);
    }

    /**
     * @test
     * @depends makeWebServiceApplication
     * @param Application $app
     */
    public function search_client(Application $app)
    {
        $response = $app->search->text('北京市');
        $this->assertV3Response($response);

        $response = $app->search->around('116.322056,39.89491', '大学');
        $this->assertV3Response($response);

        // 未知错误
        $response = $app->search->polygon('116.322056,39.89491');
        $this->assertV3Response($response);

        $response = $app->search->detail('B0FFFAB6J2');
        $this->assertV3Response($response);
    }

    /**
     * @test
     * @depends makeWebServiceApplication
     * @param Application $app
     */
    public function weather_client(Application $app)
    {
        $response = $app->weather->weatherInfo('北京市');
        $this->assertV3Response($response);
    }
}
