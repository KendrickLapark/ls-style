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
        Schema::create('extra_activities', function (Blueprint $table) {
            $table->increments('extraAct_id');
            $table->integer('activity_id')->unsigned();
            $table->string('nameInfoExtra',100)->nullable(false);
            $table->string('titleInfoExtra',55)->nullable(false);
            $table->timestamps();
            $table->foreign('activity_id')->references('activity_id')->on('activities')
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
        Schema::dropIfExists('extra_activities');
    }
};
