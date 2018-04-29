<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Survey as Survey;

class SurveyQuestionTester extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSurveyArrayReturn()
    {
        $survey = new Survey();
        $questions = $this->survey->getAll();
        $this->assertCount(21, $questions, 'Have to have 20 elements');
    }
}
