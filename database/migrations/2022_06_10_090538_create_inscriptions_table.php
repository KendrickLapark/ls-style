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
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->increments('inscription_id');
            $table->integer('volunteer_id')->unsigned();
            $table->integer('activity_id')->unsigned();
            $table->time("timeIns")->nullable(false);;
            $table->date("dateIns")->nullable(false);;
            $table->boolean('isCompletedIns')->nullable(true)->default(false);
            $table->string('filenameIns',100)->nullable(true);
            $table->boolean('isDoneIns')->nullable(false)->default(false);

            $table->foreign('volunteer_id')->references('id')->on('volunteer')
                ->onDelete('cascade');
            $table->foreign('activity_id')->references('activity_id')->on('activities')
                ->onDelete('cascade');
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
        Schema::dropIfExists('inscriptions');
    }
};
