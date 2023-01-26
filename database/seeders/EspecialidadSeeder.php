<?php

namespace Database\Seeders;

/*Importamos las clases necesarias para nuestro Seeder*/
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Especialidad;


class EspecialidadSeeder extends Seeder
{
    /**
     * Cuando ejecutamos el 'EspecialidadSeeder'
     * Vamos a cargar unos datos predeterminados.
     */
    public function run()
    {
        Especialidad::create(['nombre' => 'Cirujano']);
        Especialidad::create(['nombre' => 'Pediatria']);
        Especialidad::create(['nombre' => 'Dermatología']);
        Especialidad::create(['nombre' => 'Ginecología']);
        Especialidad::create(['nombre' => 'Psiquiatría']);
        Especialidad::create(['nombre' => 'Cardiología']);
        Especialidad::create(['nombre' => 'Gastroenterología']);
        Especialidad::create(['nombre' => 'Ogtamología']);
        Especialidad::create(['nombre' => 'Otorrinolaringología']);
        Especialidad::create(['nombre' => 'Neumología']);
        Especialidad::create(['nombre' => 'Neurología']);
        Especialidad::create(['nombre' => 'Oncología']);
    }
}
