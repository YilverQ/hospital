<?php

namespace Database\Seeders;

/*Importamos las clases necesarias para nuestro Seeder*/
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tratamiento;


class TratamientoSeeder extends Seeder
{
    /**
     * Cuando ejecutamos el 'TratamientoSeeder'
     * Vamos a cargar unos datos predeterminados.
     */
    public function run()
    {
        Tratamiento::create(['nombre' => 'Reposo']);
        Tratamiento::create(['nombre' => 'Cirujía']);
        Tratamiento::create(['nombre' => 'Quimioterapia']);
        Tratamiento::create(['nombre' => 'Radioterapia']);
        Tratamiento::create(['nombre' => 'Antibiótico']);
        Tratamiento::create(['nombre' => 'Terapia física']);
        Tratamiento::create(['nombre' => 'Consumir liquidos']);
        Tratamiento::create(['nombre' => 'Kenesioterapia']);
        Tratamiento::create(['nombre' => 'Escleroterapia']);
        Tratamiento::create(['nombre' => 'Flebotomía']);
        Tratamiento::create(['nombre' => 'Anestecia']);
        Tratamiento::create(['nombre' => 'Analgésicos']);
    }
}
