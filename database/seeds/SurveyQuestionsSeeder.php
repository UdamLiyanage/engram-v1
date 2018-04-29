<?php

use Illuminate\Database\Seeder;

class SurveyQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $questions = array('Technology is advanced enough to diagnose human illnesses');
        array_push($questions, 'Technology can play a major role in the diagnosis and treatment of mental illnesses');
        array_push($questions, 'Depression is a major problem in an individual point of view');
        array_push($questions, 'Depression can be treated with a set of planned activities');
        array_push($questions, 'Mental illnesses be cured without medicine');
        array_push($questions, 'A computer system can generate reliable treatment plans');
        array_push($questions, 'A computer system can be trusted with sensitive personal information');
        array_push($questions, 'A computer system is reliable than a human when it comes to privacy');
        array_push($questions, 'Privacy won\'t be an issue as long as personal information is not disclosed');
        array_push($questions, 'With accurate information a computer system can pin-point any illness');
        array_push($questions, 'The success of a computer based diagnosis depends solely on the accuracy of the information provided');
        array_push($questions, 'A computer diagnosis system in public domain would benefit the general public');
        array_push($questions, 'The accuracy of the diganosis depends on the knowledge base');
        array_push($questions, 'A computer based diagnosis system should be able to use alternative ways if the diagnosis does not work in the normal way');
        array_push($questions, 'A computer system should not recommend any interactive activities');
        array_push($questions, 'There\'s a limit to which a computer system can diagnose any illness. Anything beyond should be handled by humans');
        array_push($questions, 'I feel comfortable using a computer based diagnosis sytem');
        array_push($questions, 'I believe that a result given out from a computer system is accurate');
        array_push($questions, 'I believe that a computer based treatment plan should not be addictive');
        array_push($questions, 'I believe that a computer based diagnosis should give out a recommended action. Not an activity');
        DB::table('survey')->insert($questions);
    }
}
