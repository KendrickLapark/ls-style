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
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('doc_id');
            $table->integer('volunteer_id')->unsigned();
            $table->string('nameDoc',100)->nullable(false);
            $table->string('titleDoc',55)->nullable(false);
            $table->boolean('isContactModelVol')->default(false);
            $table->boolean('isInscripModelVol')->default(false);
            $table->timestamps();
            $table->foreign('volunteer_id')->references('id')->on('Volunteer')
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
        Schema::dropIfExists('documents');
    }
};
