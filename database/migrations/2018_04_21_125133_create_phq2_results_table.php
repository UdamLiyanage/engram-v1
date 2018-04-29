<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhq2ResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phq2_results', function (Blueprint $table) {
            $table->integer('question');
            $table->integer('group');
            $table->char('gender', 1);
            $table->integer('na');
            $table->integer('sd');
            $table->integer('hd');
            $table->integer('ne');
            $table->timestamp('updated_at');
        });

        $genders = ['m', 'f'];
        for($i=1; $i<3; $i++)
        {
            for($j=1; $j<7; $j++)
            {
                foreach($genders as $gender)
                {
                    DB::table('phq2_results')->insert([
                        ['question' => $i, 'group' => $j, 'gender' => $gender, 'na' => 0, 'sd' => 0, 'hd' => 0, 'ne' => 0, 'updated_at' => now()]
                    ]);
                }
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
        Schema::dropIfExists('phq2_results');
    }*/
}
