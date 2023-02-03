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
        Schema::create('volunteer_delegations', function (Blueprint $table) {
            $table->increments('vol_del_id');
            $table->integer('volunteer_id')->unsigned();
            $table->integer('delegation_id')->unsigned();
            $table->foreign('volunteer_id')->references('id')->on('volunteer');
            $table->foreign('delegation_id')->references('delegation_id')->on('delegations');
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
        Schema::dropIfExists('volunteer_delegations');
    }
};
