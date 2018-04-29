<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveyResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_results', function (Blueprint $table) {
            $table->integer('question');
            $table->integer('group');
            $table->char('gender', 1);
            $table->integer('a');
            $table->integer('na');
            $table->integer('d');
            $table->timestamp('updated_at');
        });

        $genders = ['m', 'f'];
        for($i=1; $i<21; $i++)
        {
            for($j=1; $j<7; $j++)
            {
                foreach($genders as $gender)
                    DB::table('survey_results')->insert([
                        ['question' => $i, 'group' => $j, 'gender' => $gender, 'a' => 0, 'na' => 0, 'd' => 0, 'updated_at' => now()]
                    ]);
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    /*public function down()
    {
        Schema::dropIfExists('surveyresults');
    }*/
}
