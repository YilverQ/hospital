<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diagnostico;

class DiagnosticoController extends Controller
{
    /**
     * Retorna la vista principal de 'Diagnostico'.
     * En ella podemos observar las funcionalidades
     * del CRUD. 
     */
    public function index()
    {
        $diagnosticos = Diagnostico::all();
        return view('diagnostico.index')
                    ->with('diagnosticos', $diagnosticos);
    }


    /**
     * Página que nos retorna una vista para poder crear 
     * un nuevo registro en la tabla 'diagnosticos'.
     */
    public function create()
    {
        return view('diagnostico.create');
    }


    /**
     * Método que nos crea un nuevo registro.
     * Primero tenemos que crear un objeto de tipo 'Diagnostico'.
     * Asignamos los valores que viene en la petición 'request'.
     * Persistimos el nuevo usuario en la db.
     * 
     * Creamos un nuevo mensaje flash.
     * Retornamos a la vista principal.
     */
    public function store(Request $request)
    {
        //Creamos un usuario diagnostico.
        $user = new Diagnostico;
        $user->nombre = $request->input('nombre');
        $user->save();

        //Persistimos los datos.
        session()->flash('message-success', '¡Un nuevo diagnostico fue creado!');
        return to_route('diagnostico.index');
    }


   /**
     * Página que muestra un registro de la tabla 'diagnosticos'.
     * Recibe un párametro de tipo 'Diagnostico' del modelo de db.
     * Creamos una lista con los pacientes que se relaciónan con el diagnostico.
     * Retornamos una vista ('diagnostico.show').
     */
    public function show(Diagnostico $item)
    {   $pacientes = $item->pacientes;
        return view('diagnostico.show')
                ->with('diagnostico', $item)
                ->with('pacientes', $pacientes);
    }


    /**
     * Página para editar un diagnostico.
     * Recibe un párametro de tipo 'Diagnostico'.
     * Retornamos una vista ('diagnostico.edit')
     */
    public function edit(Diagnostico $item)
    {
        return view('diagnostico.edit')
                    ->with('diagnostico', $item);
    }


    /**
     * Método para actualizar un registro de la bd.
     * Recibimos una petición request y también
     * un dato de tipo 'Diagnostico'.
     * Asignamos los nuevos valores al objeto de tipo 'Diagnostico'.
     * Persistimos los datos. 
     * Creamos un nuevo mensaje flash. 
     * retornamos a la página principal.
     */
    public function update(Request $request, Diagnostico $item)
    {
        $item->nombre = $request->input('nombre');
        $item->save();

        session()->flash('message-success', '¡El diagnostico fue actualizado exitosamente!');
        return to_route('diagnostico.index');
    }


    /**
     * Método para eliminar un registro de la bd.
     * Eliminamos el diagnostico de la tabla 'diagnosticos'.
     * Creamos un nuevo mensaje flash.
     * Redireccionamos a nuestra ruta principal.
     */
    public function destroy(Diagnostico $item)
    {
        $item->delete();

        session()->flash('message-success', '¡El diagnostico fue eliminado correctamente!');
        return to_route('diagnostico.index');
    }
}
