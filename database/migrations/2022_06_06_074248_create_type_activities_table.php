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
        Schema::create('type_activities', function (Blueprint $table) {
            $table->increments('typeAct_id');
            $table->string('nameTypeAct',100)->nullable(false);
            $table->string('descTypeAct',500)->nullable(false);
            $table->integer('sonOf')->nullable(true);
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
        Schema::dropIfExists('type_activities');
    }
};
