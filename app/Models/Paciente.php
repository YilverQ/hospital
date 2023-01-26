<?php

namespace App\Models;

/*Importamos las clases obligatorias para trabajar con modelo en Laravel*/
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Medico;
use App\Models\Diagnostico;
use App\Models\Tratamiento;

class Paciente extends Model
{
    use HasFactory;

    /**
     * Indicamos los atributos que tienen permitido cargarse de forma masiva. 
    **/
    protected $fillable = ['nombre', 
                            'apellido', 
                            'cedula', 
                            'email'];


    /**
     * Relación de N:M con el modelo "Medico". 
    **/
    public function medicos()
    {
        return $this->belongsToMany(Medico::class);
    }


    /**
     * Relación de N:M con el modelo "Diagnostico". 
    **/
    public function diagnosticos()
    {
        return $this->belongsToMany(Diagnostico::class);
    }


    /**
     * Relación de N:M con el modelo "Tratamiento". 
    **/
    public function tratamientos()
    {
        return $this->belongsToMany(Tratamiento::class);
    }
}
