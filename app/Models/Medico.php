<?php

namespace App\Models;

/*Importamos las clases obligatorias para trabajar con modelo en Laravel*/
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Especialidad;
use App\Models\Paciente;

class Medico extends Model
{
    use HasFactory;

    /**
     * Indicamos los atributos que tienen permitido cargarse de forma masiva. 
    **/
    protected $fillable = ['nombre', 
                            'apellido', 
                            'cedula', 
                            'sueldo'];


    /**
     * Relación de N:M con el modelo "Medico". 
    **/
    public function especialidades()
    {
        return $this->belongsToMany(Especialidad::class, 'especialidad_medico');
    }


    /**
     * Relación de N:M con el modelo "Paciente". 
    **/
    public function pacientes()
    {
        return $this->belongsToMany(Paciente::class);
    }
}
