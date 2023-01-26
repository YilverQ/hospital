<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Método que se ejecuta al iniciar la migración. 
     * Creamos una tabla llamada: 'medico_paciente'.
     * La tabla nace de una relación N:M entre 
     * 'medicos y pacientes'.
     * Agregamos los atributos correspondientes a la tabla.
     */
    public function up()
    {
        /**
         * id: Número de identificación único del registo. (Es autoincrementable)
         * medico_id: hace una relación con la tabla 'medicos'.
         * paciente_id: hace una relación con la tabla 'pacientes'.
         * timestamps: Marca de tiempo para cuando se crea un registro y para cuando se actualiza.
         * 
        **/
        Schema::create('medico_paciente', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medico_id');
            $table->unsignedBigInteger('paciente_id');
            $table->foreign('medico_id')
                            ->references('id')
                            ->on('medicos')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
            $table->foreign('paciente_id')
                            ->references('id')
                            ->on('especialidades')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Método que se ejecuta al hacer un rollback en la migración de laravel. 
     * Elimina la tabla 'medico_paciente'.
     */
    public function down()
    {
        Schema::dropIfExists('medico_paciente');
    }
};
