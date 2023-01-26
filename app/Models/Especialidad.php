<?php

namespace App\Models;

/*Importamos las clases obligatorias para trabajar con modelo en Laravel*/
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Medico;

class Especialidad extends Model
{
    use HasFactory;
    /* 
     * Debido a que la tabla tiene un nombre distinto a lo que la convención de laravel espera. 
     * indicamos que la tabla a la que se asociará el modelo es: 'especialidades'. 
    */
    protected $table = 'especialidades';

    /**
     * Indicamos los atributos que tienen permitido cargarse de forma masiva. 
    **/
    protected $fillable = ['nombre'];


    /**
     * Relación de N:M con el modelo "Medico". 
    **/
    public function medicos()
    {
        return $this->belongsToMany(Medico::class, 'especialidad_medico');
    }
}
