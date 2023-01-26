<?php

namespace App\Http\Controllers;

/*Importamos las clases necesarias para nuestro controlador*/
use Illuminate\Http\Request;
use App\Models\Tratamiento;

class TratamientoController extends Controller
{
    /**
     * Retorna la vista principal de 'Tratamientos'.
     * En ella podemos observar las funcionalidades
     * del CRUD. 
     */
    public function index()
    {
        $tratamientos = Tratamiento::all();
        return view('tratamiento.index')
                    ->with('tratamientos', $tratamientos);
    }


    /**
     * Página que nos retorna una vista para poder crear 
     * un nuevo registro en la tabla 'tratamientos'.
     */
    public function create()
    {
        return view('tratamiento.create');
    }


    /**
     * Método que nos crea un nuevo registro.
     * Primero tenemos que crear un objeto de tipo 'Tratamiento'.
     * Asignamos los valores que viene en la petición 'request'.
     * Persistimos el nuevo usuario en la db.
     * 
     * Creamos un nuevo mensaje flash.
     * Retornamos a la vista principal.
     */
    public function store(Request $request)
    {
        //Creamos un usuario tratamiento.
        $user = new Tratamiento;
        $user->nombre = $request->input('nombre');
        $user->save();

        //Persistimos los datos.
        session()->flash('message-success', '¡Un nuevo tratamiento fue creado!');
        return to_route('tratamiento.index');
    }


   /**
     * Página que muestra un registro de la tabla 'tratamientos'.
     * Recibe un párametro de tipo 'Tratamiento' del modelo de db.
     * Creamos una lista con los pacientes que se relaciónan con el tratamiento.
     * Retornamos una vista ('tratamiento.show').
     */
    public function show(Tratamiento $item)
    {   $pacientes = $item->pacientes;
        return view('tratamiento.show')
                ->with('tratamiento', $item)
                ->with('pacientes', $pacientes);
    }


    /**
     * Página para editar un tratamiento.
     * Recibe un párametro de tipo 'Tratamiento'.
     * Retornamos una vista ('tratamiento.edit')
     */
    public function edit(Tratamiento $item)
    {
        return view('tratamiento.edit')
                    ->with('tratamiento', $item);
    }


    /**
     * Método para actualizar un registro de la bd.
     * Recibimos una petición request y también
     * un dato de tipo 'Tratamiento'.
     * Asignamos los nuevos valores al objeto de tipo 'Tratamiento'.
     * Persistimos los datos. 
     * Creamos un nuevo mensaje flash. 
     * retornamos a la página principal.
     */
    public function update(Request $request, Tratamiento $item)
    {
        $item->nombre = $request->input('nombre');
        $item->save();

        session()->flash('message-success', '¡El Tratamiento fue actualizado exitosamente!');
        return to_route('tratamiento.index');
    }


    /**
     * Método para eliminar un registro de la bd.
     * Eliminamos el tratamiento de la tabla 'tratamientos'.
     * Creamos un nuevo mensaje flash.
     * Redireccionamos a nuestra ruta principal.
     */
    public function destroy(Tratamiento $item)
    {
        $item->delete();

        session()->flash('message-success', '¡El tratamiento fue eliminado correctamente!');
        return to_route('tratamiento.index');
    }
}
