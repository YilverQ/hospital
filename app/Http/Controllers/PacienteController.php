<?php

namespace App\Http\Controllers;

/*Importamos las clases necesarias para nuestro controlador*/
use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Medico;
use App\Models\Diagnostico;
use App\Models\Tratamiento;


class PacienteController extends Controller
{
    /**
     * Retorna la vista principal de 'Paciente'.
     * En ella podemos observar las funcionalidades
     * del CRUD. 
     */
    public function index()
    {
        $pacientes = Paciente::all();
        return view('paciente.index')
                    ->with('pacientes', $pacientes);
    }


    /**
     * Página que nos retorna una vista para poder crear 
     * un nuevo registro en la tabla 'pacientes'.
     * Tenemos que enviar una lista de 'medicos'.
     * Tenemos que enviar una lista de 'diagnosticos'.
     * Tenemos que enviar una lista de 'tratamientos'.
     * Esta lista es para que el 'paciente' 
     * pueda completar el registro nuevo.
     */
    public function create()
    {
        $medicos = Medico::all();
        $diagnosticos = Diagnostico::all();
        $tratamientos = Tratamiento::all();
        return view('paciente.create')
                    ->with('medicos', $medicos)
                    ->with('diagnosticos', $diagnosticos)
                    ->with('tratamientos', $tratamientos);
    }


    /**
     * Método que nos crea un nuevo registro.
     * Primero tenemos que crear un objeto de tipo 'Paciente'.
     * Asignamos los valores que viene en la petición 'request'.
     * Persistimos el nuevo usuario en la db.
     * 
     * Los "$request->inputs": 'medicos', 'diagnosticos' y 'tratamientos'
     * son array asociativos. Pero para guardarlos como relación de 'Paciente'.
     * Debemos pasarlos a un array convencional.
     * 
     * Luego que formateamos el array asociativo 
     * guardamos únicamente los valores que necesitamos.
     * 
     * Creamos un nuevo mensaje flash.
     * Retornamos a la vista principal.
     */
    public function store(Request $request)
    {
        //Creamos un usuario paciente.
        $paciente = new Paciente;
        $paciente->nombre = $request->input('nombre');
        $paciente->apellido = $request->input('apellido');
        $paciente->cedula = $request->input('cedula');
        $paciente->email = $request->input('email');
        $paciente->save();

        //Obtenemos los inputs como arrays asociativos.
        //Que provienen del formualrio.
        $medicos = $request->input('medicos');
        $diagnosticos = $request->input('diagnosticos');
        $tratamientos = $request->input('tratamientos');
        
        //Guardamos medicos.
        $collection = [];
        foreach ($medicos as $key => $value) {
            array_push($collection, $value);
        }
        $paciente->medicos()->attach($collection);

        //Guardamos diagnosticos.
        $collection = [];
        foreach ($diagnosticos as $key => $value) {
            array_push($collection, $value);
        }
        $paciente->diagnosticos()->attach($collection);

        //Guardamos tratamientos.
        $collection = [];
        foreach ($tratamientos as $key => $value) {
            array_push($collection, $value);
        }
        $paciente->tratamientos()->attach($collection);

        //Persistimos los datos.
        $paciente->save();
        session()->flash('message-success', '¡Un nuevo paciente fue creado!');
        return to_route('paciente.index');
    }


   /**
     * Página que muestra un registro de la tabla 'pacientes'.
     * Recibe un párametro de tipo 'Paciente' del modelo de db.
     * Creamos una lista con los medicos que se relaciónan con el paciente.
     * Creamos una lista con los diagnosticos que se relaciónan con el paciente.
     * Creamos una lista con los tratamientos que se relaciónan con el paciente.
     * Retornamos una vista ('paciente.show').
     */
    public function show(Paciente $item)
    {   
        $medicos = $item->medicos;
        $diagnosticos = $item->diagnosticos;
        $tratamientos = $item->tratamientos;
        return view('paciente.show')
                ->with('paciente', $item)
                ->with('medicos', $medicos)
                ->with('diagnosticos', $diagnosticos)
                ->with('tratamientos', $tratamientos);
    }


    /**
     * Página para editar un paciente.
     * Recibe un párametro de tipo 'Paciente'.
     * '$medicos', '$diagnosticos', '$tratamientos' 
     * son variables que guardan una lista de todos los registros de sus correspondiente tabla.
     * 
     * 'sus_medicos', 'sus_diagnosticos', 'sus_tratamientos'. Contiene una lista con todos
     * los registros que están relacionado con la tabla 'paciente'. 
     * 
     * Iteramos cada registro para formatear los datos y guardar los que necesitamos. 
     * Esto es debido a que son array asociativos. 
     * Pero únicamente necesitamos que sean un array de 'nombres'.
     * 
     * Retornamos una vista ('paciente.edit')
     */
    public function edit(Paciente $item)
    {   
        $medicos = Medico::all();
        $diagnosticos = Diagnostico::all();
        $tratamientos = Tratamiento::all();
        
        $sus_medicos = $item->medicos;
        $sus_diagnosticos = $item->diagnosticos;
        $sus_tratamientos = $item->tratamientos;

        //Formateamos los medicos. 
        $collection = [];
        foreach ($sus_medicos as $key => $value) {
            array_push($collection, $value->nombre);
        }
        $sus_medicos = $collection;


        //Formateamos los diagnosticos. 
        $collection = [];
        foreach ($sus_diagnosticos as $key => $value) {
            array_push($collection, $value->nombre);
        }
        $sus_diagnosticos = $collection;


        //Formateamos los tratamientos. 
        $collection = [];
        foreach ($sus_tratamientos as $key => $value) {
            array_push($collection, $value->nombre);
        }
        $sus_tratamientos = $collection;

        return view('paciente.edit')
                    ->with('paciente', $item)
                    ->with('medicos', $medicos)
                    ->with('sus_medicos', $sus_medicos)
                    ->with('diagnosticos', $diagnosticos)
                    ->with('sus_diagnosticos', $sus_diagnosticos)
                    ->with('tratamientos', $tratamientos)
                    ->with('sus_tratamientos', $sus_tratamientos);
    }


    /**
     * Método para actualizar un registro de la bd.
     * Recibimos una petición request y también un dato de tipo 'Paciente'.
     * Asignamos los nuevos valores al objeto de tipo 'Paciente'.
     * Persistimos los datos. 
     * Creamos un nuevo mensaje flash. 
     * retornamos a la página principal.
     */
    public function update(Request $request, Paciente $item)
    {
        $item->nombre = $request->input('nombre');
        $item->apellido = $request->input('apellido');
        $item->cedula = $request->input('cedula');
        $item->email = $request->input('email');
        $item->save();

        //Obtenemos los inputs como arrays asociativos.
        //Que provienen del formualrio.
        $medicos = $request->input('medicos');
        $diagnosticos = $request->input('diagnosticos');
        $tratamientos = $request->input('tratamientos');
        
        //Guardamos medicos.
        $collection = [];
        foreach ($medicos as $key => $value) {
            array_push($collection, $value);
        }
        $item->medicos()->sync($collection);

        //Guardamos diagnosticos.
        $collection = [];
        foreach ($diagnosticos as $key => $value) {
            array_push($collection, $value);
        }
        $item->diagnosticos()->sync($collection);

        //Guardamos tratamientos.
        $collection = [];
        foreach ($tratamientos as $key => $value) {
            array_push($collection, $value);
        }
        $item->tratamientos()->sync($collection);

        //Persistimos los datos.
        $item->save();
        session()->flash('message-success', '¡El paciente fue actualizado exitosamente!');
        return to_route('paciente.index');
    }


    /**
     * Método para eliminar un registro de la bd.
     * Eliminamos el paciente de la tabla 'pacientes'.
     * Creamos un nuevo mensaje flash.
     * Redireccionamos a nuestra ruta principal.
     */
    public function destroy(Paciente $item)
    {
        $item->delete();

        session()->flash('message-success', '¡El paciente fue eliminado correctamente!');
        return to_route('paciente.index');
    }
}
