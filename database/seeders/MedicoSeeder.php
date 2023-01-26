<?php

namespace Database\Seeders;

/*Importamos las clases necesarias para nuestro Seeder*/
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Medico;


class MedicoSeeder extends Seeder
{
    /**
     * Cuando ejecutamos el 'MedicoSeeder'
     * Vamos a cargar unos datos predeterminados.
     */
    public function run()
    {
        Medico::create([
                'nombre' => 'Juan',
                'apellido' => 'Castillo',
                'cedula' => '26123098',
                'sueldo' => 150]);

        Medico::create([
                'nombre' => 'Victoria',
                'apellido' => 'Rodriguez',
                'cedula' => '22102567',
                'sueldo' => 200]);

        Medico::create([
                'nombre' => 'Mirella',
                'apellido' => 'Díaz',
                'cedula' => '16789111',
                'sueldo' => 175]);
    }
}
