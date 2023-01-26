<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Método que se ejecuta al iniciar la migración. 
     * Creamos una tabla llamada: 'pacientes'.
     * Agregamos los atributos correspondientes a la tabla.
     */
    public function up()
    {
        /**
         * id: Número de identificación único del registo. (Es autoincrementable)
         * nombre: nombre del paciente.
         * apellido: apellido del paciente. 
         * cedula: Número de identificación de la persona. (Debe ser único). 
         * email: nombre del correo electrónico de la persona. 
         * timestamps: Marca de tiempo para cuando se crea un registro y para cuando se actualiza.
         * 
        **/
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('cedula')->unique();
            $table->string('email')->unique();
            $table->timestamps();
        });
    }


    /**
     * Método que se ejecuta al hacer un rollback en la migración de laravel. 
     * Elimina la tabla 'pacientes'.
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
};
