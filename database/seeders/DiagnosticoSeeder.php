<?php

namespace Database\Seeders;

/*Importamos las clases necesarias para nuestro Seeder*/
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Diagnostico;


class DiagnosticoSeeder extends Seeder
{
    /**
     * Cuando ejecutamos el 'DiagnosticoSeeder'
     * Vamos a cargar unos datos predeterminados.
     */
    public function run()
    {
        Diagnostico::create(['nombre' => 'Diabetes']);
        Diagnostico::create(['nombre' => 'Cáncer']);
        Diagnostico::create(['nombre' => 'Asma']);
        Diagnostico::create(['nombre' => 'Caries']);
        Diagnostico::create(['nombre' => 'Gripe común']);
        Diagnostico::create(['nombre' => 'Hepatitis']);
        Diagnostico::create(['nombre' => 'Estrés']);
        Diagnostico::create(['nombre' => 'Diarrea']);
        Diagnostico::create(['nombre' => 'Alzheimer']);
        Diagnostico::create(['nombre' => 'SIDA']);
        Diagnostico::create(['nombre' => 'Anorexia']);
        Diagnostico::create(['nombre' => 'Hipertensión arterial']);
        Diagnostico::create(['nombre' => 'Embolia Pulmonar']);
        Diagnostico::create(['nombre' => 'Diverticulosis']);
        Diagnostico::create(['nombre' => 'Deshidratación']);
    }
}
