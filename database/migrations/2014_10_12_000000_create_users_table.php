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
        Schema::create('Volunteer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nameVol',20)->nullable(false);
            $table->string('surnameVol',20)->nullable(false);
            $table->string('surname2Vol',20)->nullable(false);
            $table->date('birthDateVol')->nullable(false);
            $table->enum('typeDocVol', ['DNI', 'NIE', 'Pasaporte'])->nullable(false);
            $table->string('numDocVol',10)->nullable(false);
            $table->string('telVol',15)->nullable(false);
            $table->enum('sexVol', ['Hombre', 'Mujer', 'Otro'])->nullable(false);
            $table->enum('shirtSizeVol', ['XS', 'S', 'M', 'L', 'XL', '2XL', '3XL'])->nullable(false);
            $table->string('persMailVol',100)->nullable(false);
            $table->string('corpMailVol',100)->nullable(true);
            $table->string('password')->nullable(false);
            $table->enum('typeViaVol', ['Autopista', 'Autovía', 'Avenida', 'Bulevar', 'Calle', 'Calle peatonal', 'Callejón', 'Camino', 'Cañada real', 'Carretera', 'Carretera de circunvalación', 'Carril', 'Ciclovía', 'Corredera', 'Costanilla', 'Parque', 'Pasadizo elevado', 'Pasaje', 'Paseo marítimo', 'Plaza', 'Pretil', 'Puente', 'Ronda', 'Sendero', 'Travesía', 'Túnel', 'Vía pecuaria', 'Vía rápida', 'Vía verde', 'Urbanización'])->nullable(false);
            $table->string('direcVol',50)->nullable(false);
            $table->string('numVol',10)->nullable(false);
            $table->string('flatVol',10)->nullable(true);
            $table->string('aditiInfoVol',100)->nullable();
            $table->string('codPosVol',7)->nullable(false);
            $table->string('stateVol',20)->nullable(false);
            $table->string('townVol',20)->nullable(false);
            $table->string('imageVol', 45)->nullable(true)->default(false);
            $table->string('organiVol',20)->nullable(true)->default(false);
            /********/
            $table->boolean('isLoggeable')->default(true);
            $table->boolean('isAdminVol')->default(false);
            $table->boolean('isInternVol')->default(false);
            $table->boolean('isRegisterComplete')->default(false);
            /********/
            $table->string('nameAuthVol',40)->nullable();
            $table->string('tlfAuthVol',15)->nullable();
            $table->string('numDocAuthVol',10)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
