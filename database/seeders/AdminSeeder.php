<?php

namespace Database\Seeders;

/*Importamos las clases necesarias para nuestro Seeder*/
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Cuando ejecutamos el 'AdminSeeder'
     * Vamos a cargar unos datos predeterminados.
     */
    public function run()
    {
        Admin::create([
            'username' => 'root',
            'password' => 'root'
        ]);
    }
}
