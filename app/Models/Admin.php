<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    /**
     * Indicamos los atributos que tienen permitido cargarse de forma masiva. 
    **/
    protected $fillable = ['username', 'password'];
}
