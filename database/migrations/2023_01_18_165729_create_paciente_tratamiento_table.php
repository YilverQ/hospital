<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Método que se ejecuta al iniciar la migración. 
     * Creamos una tabla llamada: 'paciente_tratamiento'.
     * La tabla nace de una relación N:M entre 
     * 'pacientes y tratamientos'.
     * Agregamos los atributos correspondientes a la tabla.
     */
    public function up()
    {
        /**
         * id: Número de identificación único del registo. (Es autoincrementable)
         * paciente_id: hace una relación con la tabla 'pacientes'.
         * tratamiento_id: hace una relación con la tabla 'tratamientos'.
         * timestamps: Marca de tiempo para cuando se crea un registro y para cuando se actualiza.
         * 
        **/
        Schema::create('paciente_tratamiento', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paciente_id');
            $table->unsignedBigInteger('tratamiento_id');
            $table->foreign('paciente_id')
                            ->references('id')
                            ->on('pacientes')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
            $table->foreign('tratamiento_id')
                            ->references('id')
                            ->on('tratamientos')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Método que se ejecuta al hacer un rollback en la migración de laravel. 
     * Elimina la tabla 'paciente_tratamiento'.
     */
    public function down()
    {
        Schema::dropIfExists('paciente_tratamiento');
    }
};
