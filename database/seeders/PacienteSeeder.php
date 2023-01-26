<?php

namespace Database\Seeders;


/*Importamos las clases necesarias para nuestro Seeder*/
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Paciente;


class PacienteSeeder extends Seeder
{
    /**
     * Cuando ejecutamos el 'PacienteSeeder'
     * Vamos a cargar unos datos predeterminados.
     */
    public function run()
    {
        Paciente::create([
                'nombre' => 'Victor',
                'apellido' => 'Rodriguez',
                'cedula' => '20321543',
                'email' => 'victor@gmail.com']);

        Paciente::create([
                'nombre' => 'Franchesca',
                'apellido' => 'Montana',
                'cedula' => '21214356',
                'email' => 'franchesca@gmail.com']);

        Paciente::create([
                'nombre' => 'Julio',
                'apellido' => 'Días',
                'cedula' => '11678345',
                'email' => 'julio@gmail.com']);
    }
}
