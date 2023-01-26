<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especialidad;

class EspecialidadController extends Controller
{
    /**
     * Retorna la vista principal de 'Especialidad'.
     * En ella podemos observar las funcionalidades
     * del CRUD. 
     */
    public function index()
    {
        $especialidades = Especialidad::all();
        return view('especialidad.index')
                    ->with('especialidades', $especialidades);
    }


    /**
     * Página que nos retorna una vista para poder crear 
     * un nuevo registro en la tabla 'especialidades'.
     */
    public function create()
    {
        return view('especialidad.create');
    }


    /**
     * Método que nos crea un nuevo registro.
     * Primero tenemos que crear un objeto de tipo 'Especialidad'.
     * Asignamos los valores que viene en la petición 'request'.
     * Persistimos el nuevo usuario en la db.
     * 
     * Creamos un nuevo mensaje flash.
     * Retornamos a la vista principal.
     */
    public function store(Request $request)
    {
        //Creamos un usuario especialidad.
        $user = new Especialidad;
        $user->nombre = $request->input('nombre');
        $user->save();

        //Persistimos los datos.
        session()->flash('message-success', '¡Un nuevo especialidad fue creado!');
        return to_route('especialidad.index');
    }


   /**
     * Página que muestra un registro de la tabla 'especialidades'.
     * Recibe un párametro de tipo 'Especialidad' del modelo de db.
     * Creamos una lista con los pacientes que se relaciónan con el especialidad.
     * Retornamos una vista ('especialidad.show').
     */
    public function show(Especialidad $item)
    {   $medicos = $item->medicos;
        return view('especialidad.show')
                ->with('especialidad', $item)
                ->with('medicos', $medicos);
    }


    /**
     * Página para editar un especialidad.
     * Recibe un párametro de tipo 'Especialidad'.
     * Retornamos una vista ('especialidad.edit')
     */
    public function edit(Especialidad $item)
    {
        return view('especialidad.edit')
                    ->with('especialidad', $item);
    }


    /**
     * Método para actualizar un registro de la bd.
     * Recibimos una petición request y también
     * un dato de tipo 'Especialidad'.
     * Asignamos los nuevos valores al objeto de tipo 'Especialidad'.
     * Persistimos los datos. 
     * Creamos un nuevo mensaje flash. 
     * retornamos a la página principal.
     */
    public function update(Request $request, Especialidad $item)
    {
        $item->nombre = $request->input('nombre');
        $item->save();

        session()->flash('message-success', '¡El especialidad fue actualizado exitosamente!');
        return to_route('especialidad.index');
    }


    /**
     * Método para eliminar un registro de la bd.
     * Eliminamos el especialidad de la tabla 'especialidades'.
     * Creamos un nuevo mensaje flash.
     * Redireccionamos a nuestra ruta principal.
     */
    public function destroy(Especialidad $item)
    {
        $item->delete();

        session()->flash('message-success', '¡El especialidad fue eliminado correctamente!');
        return to_route('especialidad.index');
    }
}
