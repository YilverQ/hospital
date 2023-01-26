<?php

namespace App\Models;

/*Importamos las clases obligatorias para trabajar con modelo en Laravel*/
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Paciente;

class Diagnostico extends Model
{
    use HasFactory;
    
    /**
     * Indicamos los atributos que tienen permitido cargarse de forma masiva. 
    **/
    protected $fillable = ['nombre'];


    /**
     * Relación de N:M con el modelo "Paciente". 
    **/
    public function pacientes()
    {
        return $this->belongsToMany(Paciente::class);
    }
}
