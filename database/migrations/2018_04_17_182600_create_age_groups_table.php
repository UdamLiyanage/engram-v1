<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgeGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('age_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('group');
        });

        $groups = ['Younger than 21', '21-30', '31-40', '41-50', '51-60', 'Older than 60'];
        foreach($groups as $group)
            DB::table('age_groups')->insert(['group' => $group]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    /*public function down()
    {
        Schema::dropIfExists('age_groups');
    }*/
}
