<?php

namespace Tests\Unit;

use Tests\TestCase;

class RouteTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testIndexPage()
    {
        $response = $this->get('/');
        $this->assertEquals(200, $response->status());
    }

    public function testDiagonsisPage()
    {
        $response = $this->get('/diagnose');
        $this->assertEquals(200, $response->status());
    }

    public function testSurveyPage()
    {
        $response = $this->get('/survey');
        $this->assertEquals(200, $response->status());
    }
}
