<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhq9QuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phq9_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('question', 256);
        });

        $questions = array('Little interest or pleasure in doing things');
        array_push($questions, 'Feeling down, depreseed or hopeless');
        array_push($questions, 'Trouble falling asleep, staying asleep, or sleeping too much');
        array_push($questions, 'Feeling tired or having little enrgy');
        array_push($questions, 'Poor appetite or overeating');
        array_push($questions, 'Feeling a bad about yourself - or that you are a failiure or you have let yourself or your familty down');
        array_push($questions, 'Trouble concentrating or things, such as reading the newspaper or watching television');
        array_push($questions, 'Moving or speaking so slowly that other people could have noticed. Or, the opposite being so fidgety or restless that you have been moving around a lot more than usual');
        array_push($questions, 'Thoughts that you would be better off dead or of hurting yourself in some way');

        foreach($questions as $question)
            DB::table('phq9_questions')->insert(['question' => $question]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    /*public function down()
    {
        Schema::dropIfExists('phq9_questions');
    }*/
}
