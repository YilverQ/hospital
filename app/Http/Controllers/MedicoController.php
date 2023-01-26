<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medico;
use App\Models\Especialidad;

class MedicoController extends Controller
{
    /**
     * Retorna la vista principal de 'Medico'.
     * En ella podemos observar las funcionalidades
     * del CRUD. 
     */
    public function index()
    {
        $medicos = Medico::all();
        return view('medico.index')
                    ->with('medicos', $medicos);
    }


    /**
     * Página que nos retorna una vista para poder crear 
     * un nuevo registro en la tabla 'medicos'.
     */
    public function create()
    {
        $especialidades = Especialidad::all();
        return view('medico.create')
                    ->with('especialidades', $especialidades);
    }


    /**
     * Método que nos crea un nuevo registro.
     * Primero tenemos que crear un objeto de tipo 'Medico'.
     * Asignamos los valores que viene en la petición 'request'.
     * Persistimos el nuevo usuario en la db.
     * 
     * Luego, asignamos el array asociativo a 'especialidades'.
     * Creamos una array que tendrá las especialidades. 
     * Formateamos el array asociativo y guardamos únicamente los valores que necesitamos.
     * Guardamos la lista de 'especialidades' para el 'medico'
     * Creamos un nuevo mensaje flash.
     * Retornamos a la vista principal.
     */
    public function store(Request $request)
    {
        //Creamos un usuario medico.
        $medico = new Medico;
        $medico->nombre = $request->input('nombre');
        $medico->apellido = $request->input('apellido');
        $medico->cedula = $request->input('cedula');
        $medico->sueldo = $request->input('sueldo');
        $medico->save();

        $especialidades = $request->input('especialidades');
        $collection = [];
        foreach ($especialidades as $key => $value) {
            array_push($collection, $value);
        }
        $medico->especialidades()->attach($collection);

        //Persistimos los datos.
        session()->flash('message-success', '¡Un nuevo medico fue creado!');
        return to_route('medico.index');
    }


   /**
     * Página que muestra un registro de la tabla 'medicos'.
     * Recibe un párametro de tipo 'Medico' del modelo de db.
     * Creamos una lista con los pacientes que se relaciónan con el medico.
     * Retornamos una vista ('medico.show').
     */
    public function show(Medico $item)
    {   $especialidades = $item->especialidades;
        return view('medico.show')
                ->with('medico', $item)
                ->with('especialidades', $especialidades);
    }


    /**
     * Página para editar un medico.
     * Recibe un párametro de tipo 'Medico'.
     * Retornamos una vista ('medico.edit')
     */
    public function edit(Medico $item)
    {   
        $especialidades = Especialidad::all();
        $sus_especialidades = $item->especialidades;
        $collection = [];
        foreach ($sus_especialidades as $key => $value) {
            array_push($collection, $value->nombre);
        }
        return view('medico.edit')
                    ->with('medico', $item)
                    ->with('collection', $collection)
                    ->with('especialidades', $especialidades);
    }


    /**
     * Método para actualizar un registro de la bd.
     * Recibimos una petición request y también
     * un dato de tipo 'Medico'.
     * Asignamos los nuevos valores al objeto de tipo 'Medico'.
     * Persistimos los datos. 
     * Creamos un nuevo mensaje flash. 
     * retornamos a la página principal.
     */
    public function update(Request $request, Medico $item)
    {
        $item->nombre = $request->input('nombre');
        $item->apellido = $request->input('apellido');
        $item->cedula = $request->input('cedula');
        $item->sueldo = $request->input('sueldo');
        $item->save();

        $especialidades = $request->input('especialidades');
        $collection = [];
        foreach ($especialidades as $key => $value) {
            array_push($collection, $value);
        }
        $item->especialidades()->sync($collection);
        $item->save();


        session()->flash('message-success', '¡El medico fue actualizado exitosamente!');
        return to_route('medico.index');
    }


    /**
     * Método para eliminar un registro de la bd.
     * Eliminamos el medico de la tabla 'medicos'.
     * Creamos un nuevo mensaje flash.
     * Redireccionamos a nuestra ruta principal.
     */
    public function destroy(Medico $item)
    {
        $item->delete();

        session()->flash('message-success', '¡El médico fue eliminado correctamente!');
        return to_route('medico.index');
    }
}
