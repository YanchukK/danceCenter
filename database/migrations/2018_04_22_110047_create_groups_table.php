<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
//            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('date_time')->nullable();
            $table->string('group_img');
            $table->timestamps();
        });

//        Schema::table('groups', function ($table) {
//            $table->integer('teacher_id')->unsigned();
//            $table->foreign('teacher_id')->references('id')->on('teachers');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
    }
}
