<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     /**
     * Método que se ejecuta al iniciar la migración. 
     * Creamos una tabla llamada: 'diagnosticos'.
     * Agregamos los atributos correspondientes a la tabla.
     */
   public function up()
    {
        /**
         * id: Número de identificación único del registo. (Es autoincrementable)
         * nombre: es el nombre de la enfermedad (es un valor único).
         * timestamps: Marca de tiempo para cuando se crea un registro y para cuando se actualiza.
        **/
        Schema::create('diagnosticos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->timestamps();
        });
    }

    /**
     * Método que se ejecuta al hacer un rollback en la migración de laravel. 
     * Elimina la tabla 'diagnosticos'.
     */
    public function down()
    {
        Schema::dropIfExists('diagnosticos');
    }
};
