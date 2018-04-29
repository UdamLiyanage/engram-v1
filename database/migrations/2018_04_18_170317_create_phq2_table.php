<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhq2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phq2_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('question');
        });

        DB::table('phq2_questions')->insert(['question' => 'Little interest or pleasure in doing things']);
        DB::table('phq2_questions')->insert(['question' => 'Feeling down, depressed or hopeless']);        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    /*public function down()
    {
        Schema::dropIfExists('phq2_questions');
    }*/
}
