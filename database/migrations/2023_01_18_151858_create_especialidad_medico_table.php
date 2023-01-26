<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Método que se ejecuta al iniciar la migración. 
     * Creamos una tabla llamada: 'especialidad_medico'.
     * La tabla nace de una relación N:M entre 
     * 'Especialidades y Medicos'.
     * Agregamos los atributos correspondientes a la tabla.
     */
    public function up()
    {
        /**
         * id: Número de identificación único del registo. (Es autoincrementable)
         * especialidad_id: hace una relación con la tabla 'especialidades'.
         * medico_id: hace una relación con la tabla 'medicos'.
         * timestamps: Marca de tiempo para cuando se crea un registro y para cuando se actualiza.
         * 
        **/
        Schema::create('especialidad_medico', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('especialidad_id');
            $table->unsignedBigInteger('medico_id');
            $table->foreign('especialidad_id')
                            ->references('id')
                            ->on('especialidades')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
            $table->foreign('medico_id')
                            ->references('id')
                            ->on('medicos')
                            ->onDelete('cascade')
                            ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Método que se ejecuta al hacer un rollback en la migración de laravel. 
     * Elimina la tabla 'especialidades_medicos'.
     */
    public function down()
    {
        Schema::dropIfExists('especialidad_medico');
    }
};
