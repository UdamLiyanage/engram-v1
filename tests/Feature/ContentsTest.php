<?php

namespace Tests\Feature;

use Tests\TestCase;


class ContentsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSurveyLandingPage()
    {
        $response = $this->get('/survey');
        $this->assertContains('Younger than 21',
            $response->getContent(),
            'HTML Should have younger than 21'
        );
    }

    public function testDiagnoseLandingPage()
    {
        $reponse = $this->get('/diagnose');
        $this->assertContains('Younger than 21',
            $reponse->getContent(),
            'HTML Should have younger than 21'
        );
    }
}
