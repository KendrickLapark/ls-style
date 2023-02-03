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
        Schema::create('education', function (Blueprint $table) {
            $table->increments('education_id');
            $table->integer('volunteer_id')->unsigned();
            $table->string('titleEdu',55)->nullable(false);
            $table->string('hoursEdu',5)->nullable(false);
            $table->date('endEdu')->nullable(false);
            $table->string('filenameEdu',100)->nullable(false);
            $table->foreign('volunteer_id')->references('id')->on('volunteer')
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
        Schema::dropIfExists('education');
    }
};
