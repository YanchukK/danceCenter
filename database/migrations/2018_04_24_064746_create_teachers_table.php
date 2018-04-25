<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
//            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('login');
            $table->string('password')->nullable();
            $table->string('name')->nullable();
            $table->string('l_name')->nullable();
            $table->string('email')->nullable();
            $table->bigInteger('p_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
