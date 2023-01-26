<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Método que se ejecuta al iniciar la migración. 
     * Creamos una tabla llamada: 'medicos'.
     * Agregamos los atributos correspondientes a la tabla.
     */
    public function up()
    {
        /**
         * id: Número de identificación único del registo. (Es autoincrementable)
         * nombre: nombre del médico. 
         * apellido: apellido del médico.
         * cedula: Número de identificación de la persona. (Debe ser único). 
         * sueldo: Valor que representa el sueldo del médico. 
         * timestamps: Marca de tiempo para cuando se crea un registro y para cuando se actualiza.
         * 
        **/
        Schema::create('medicos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('cedula')->unique();
            $table->float('sueldo');
            $table->timestamps();
        });
    }


    /**
     * Método que se ejecuta al hacer un rollback en la migración de laravel. 
     * Elimina la tabla 'medicos'.
     */
    public function down()
    {
        Schema::dropIfExists('medicos');
    }
};
