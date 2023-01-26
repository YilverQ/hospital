<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Método que se ejecuta al iniciar la migración. 
     * Creamos una tabla llamada: 'diagnostico_paciente'.
     * La tabla nace de una relación N:M entre 
     * 'diagnosticos y pacientes'.
     * Agregamos los atributos correspondientes a la tabla.
     */
    public function up()
    {
        /**
         * id: Número de identificación único del registo. (Es autoincrementable)
         * diagnostico_id: hace una relación con la tabla 'diagnosticos'.
         * paciente_id: hace una relación con la tabla 'pacientes'.
         * timestamps: Marca de tiempo para cuando se crea un registro y para cuando se actualiza.
         * 
        **/
        Schema::create('diagnostico_paciente', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('diagnostico_id');
            $table->unsignedBigInteger('paciente_id');
            $table->foreign('diagnostico_id')
                            ->references('id')
                            ->on('diagnosticos')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
            $table->foreign('paciente_id')
                            ->references('id')
                            ->on('pacientes')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Método que se ejecuta al hacer un rollback en la migración de laravel. 
     * Elimina la tabla 'diagnostico_paciente'.
     */
    public function down()
    {
        Schema::dropIfExists('diagnostico_paciente');
    }
};
