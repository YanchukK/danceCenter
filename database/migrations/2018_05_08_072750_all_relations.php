<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AllRelations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('groups', function (Blueprint $table) {
            $table->integer('teacher_id')->unsigned()->nullable();
            $table->foreign('teacher_id')->references('id')->on('teachers');
            $table->integer('branch_id')->unsigned()->nullable();
            $table->foreign('branch_id')->references('id')->on('branches');
            $table->integer('style_id')->unsigned()->nullable();
            $table->foreign('style_id')->references('id')->on('styles');
            $table->integer('notice_id')->unsigned()->nullable();
            $table->foreign('notice_id')->references('id')->on('notices');
            $table->integer('price_id')->unsigned()->nullable();
            $table->foreign('price_id')->references('id')->on('prices');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('groups', function (Blueprint $table) {
            Schema::dropIfExists('groups');
        });
    }
}
