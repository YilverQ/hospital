<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Cuando realizamos un seed con laravel. 
     * Llamamos a todas las clases de tipo
     * 'Seeder'. y las ejecutamos. 
     * Con esto, podemos cargar ciertos datos
     * predeterminados para que funcione nuestra
     * aplicación.
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(TratamientoSeeder::class);
        $this->call(DiagnosticoSeeder::class);
        $this->call(EspecialidadSeeder::class);
        $this->call(MedicoSeeder::class);
        $this->call(PacienteSeeder::class);
        $this->call(RelacionesSeeder::class);
    }
}
