<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Diagnostico;
use App\Models\Especialidad;
use App\Models\Medico;
use App\Models\Paciente;
use App\Models\Tratamiento;

class RelacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*Relación: 'Especialidad - Medico' */
        $medico = Medico::find(1);
        $medico->especialidades()->attach([1,2,3]);
        $medico = Medico::find(2);
        $medico->especialidades()->attach([2,4,5]);
        $medico = Medico::find(3);
        $medico->especialidades()->attach([3]);


        /*Relación: 'Medico - Paciente' */
        $medico = Medico::find(1);
        $medico->pacientes()->attach([1,2]);
        $medico = Medico::find(2);
        $medico->pacientes()->attach([1,2,3]);
        $medico = Medico::find(3);
        $medico->pacientes()->attach([3]);


        /*Relación: 'Diagnostico - Paciente' */
        $paciente = Paciente::find(1);
        $paciente->diagnosticos()->attach([1,2,3]);
        $paciente = Paciente::find(2);
        $paciente->diagnosticos()->attach([4,5,6]);
        $paciente = Paciente::find(3);
        $paciente->diagnosticos()->attach([7,8,9]);


        /*Relación: 'Paciente - Tratamiento' */
        $paciente = Paciente::find(1);
        $paciente->tratamientos()->attach([1,2,3]);
        $paciente = Paciente::find(2);
        $paciente->tratamientos()->attach([4,5,6]);
        $paciente = Paciente::find(3);
        $paciente->tratamientos()->attach([7,8,9,10,11,12]);
    }
}
