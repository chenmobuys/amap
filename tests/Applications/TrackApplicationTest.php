<?php

namespace Chen\Amap\Tests\Applications;

use Chen\Amap\Factory;
use Chen\Amap\Tests\TestCase;
use Chen\Amap\Track\Application;

class TrackApplicationTest extends TestCase
{
    /** @test */
    public function makeTrackApplication()
    {
        $app = Factory::track($this->getConfig());
        $this->assertEquals('Chen\\Amap\\Track\\Application', get_class($app));
        return $app;
    }

    /**
     * @test
     * @depends makeTrackApplication
     * @param Application $app
     */
    public function all_clients(Application $app)
    {
        $response = $app->service->search();
        $services = (array)(isset($response['data']['results']) ? $response['data']['results'] : []);
        foreach ($services as $service) {
            $app->service->delete($service['sid']);
        }

        $response = $app->service->create('foo');
        $this->assertV1Response($response);
        $sid = 'xxxx';

        $response = $app->service->update($sid, 'bar');
        $this->assertV1Response($response);

        $response = $app->service->search();
        $this->assertV1Response($response);

        $response = $app->terminal_search->text($sid, '北京市');
        $this->assertV1Response($response);

        $response = $app->terminal_search->around($sid, '39.89491,116.322056');
        $this->assertV1Response($response);

        $response = $app->terminal_search->polygon($sid, '116.298367,39.903931;116.354157,39.903009;116.356217,39.875745;116.282231,39.881936');
        $this->assertV1Response($response);

        $response = $app->terminal_search->district($sid, '北京市');
        $this->assertV1Response($response);

        $response = $app->terminal_column->create($sid, 'foo', 'string');
        $this->assertV1Response($response);

        $response = $app->terminal_column->update($sid, 'foo', 'bar');
        $this->assertV1Response($response);

        $response = $app->terminal_column->search($sid);
        $this->assertV1Response($response);

        $response = $app->terminal_column->delete($sid, 'bar');
        $this->assertV1Response($response);

        $response = $app->terminal->create($sid, 'foo');
        $this->assertV1Response($response);
        $tid = 'xxxx';

        $response = $app->terminal->update($sid, $tid, 'bar');
        $this->assertV1Response($response);

        $response = $app->terminal->search($sid);
        $this->assertV1Response($response);

        $response = $app->trace->create($sid, $tid);
        $this->assertV1Response($response);
        $trid = 'xxxx';

        // array( [errcode] => 20003 [errdetail] => 未知错误  [errmsg] => UNKNOWN_ERROR )
        $points = [["location" => "116.397428,39.90923", "locatetime" => 1544176895000, "speed" => 40, "direction" => 120, "height" => 39, "accuracy" => 20]];
        $response = $app->trace->pointUpload($sid, $tid, $trid, $points);
        $this->assertV1Response($response);

        $response = $app->terminal_monitor->lastpoint($sid, $tid, $trid);
        $this->assertV1Response($response);

        $response = $app->grasproad->search($sid, $tid, $trid);
        $this->assertV1Response($response);

        $response = $app->trace->delete($sid, $tid, $trid);
        $this->assertV1Response($response);

        $response = $app->terminal->delete($sid, $tid);
        $this->assertV1Response($response);

        $response = $app->service->delete($sid);
        $this->assertV1Response($response);
    }
}
