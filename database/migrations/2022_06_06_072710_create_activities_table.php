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
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('activity_id');
            $table->string('nameAct',60)->nullable(false);
            $table->string('descAct',500)->nullable(false);
            $table->string('entityAct',50)->nullable(false);
            $table->string('direAct',100)->nullable(false);
            $table->time("timeAct");
            $table->time("endTimeAct");
            $table->date("dateAct");

            $table->string('requiPrevAct',100)->default('No se requiere');
            $table->string('requiAct',400);

            $table->string('formaAct',100)->nullable(false);

            $table->boolean('isPreseAct')->default(true);
            $table->integer('quotasAct');
            $table->boolean('isVisible')->default(false);
            $table->boolean('isNulledAct')->default(false);
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
        Schema::dropIfExists('activities');
    }
};
