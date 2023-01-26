<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;


class LoginController extends Controller
{
    /**
     * Retornamos la vista principal.
     * El login nos permite logearnos en la plataforma.
     */
    public function index()
    {
        return view('login.index');
    }


    /**
     * Acción para comprobar el administrador.
     * Capturamos los inputs 'username' y 'password'.
     * Instanciamos el administrador en la variable '$admin.
     * Comprobamos que los datos coincidan.
     * Si lo hacen, nos retorna a la página principal del administrador.
     * Caso contrario, nos retorna al login. 
     */
    public function auth(Request $request)
    {
        $name = $request->input('username');
        $password = $request->input('password');
        $admin = Admin::find(1);
        if ($name == $admin->username and $password == $admin->password) {
            $request->session()->put('is_valid', 'true');
            return to_route('home');
        }

        session()->flash('message-error', 'Error, los datos ingresados no son correctos');
        return to_route('login.index');
    }


    /**
     * Acción que nos deslogea de la plataforma.
     * Primero eliminamos las sessiones del administrador.
     * Luego nos redirigimos a la vista de login.
     */
    public function logout(Request $request)
    {
        $request->session()->forget('is_valid');
        //Debemos eliminar las session y redirigirnos a la vista de login.
        return to_route('login.index');
    }
}
