<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_type_activities', function (Blueprint $table) {
            $table->increments('act_typeAct_id');
            $table->integer('activity_id')->unsigned();
            $table->integer('typeActivity_id')->unsigned();
            $table->foreign('activity_id')->references('activity_id')->on('activities')
                ->onDelete('cascade');
            $table->foreign('typeActivity_id')->references('typeAct_id')->on('type_activities')
                 ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activity_type_activities');
    }
};
