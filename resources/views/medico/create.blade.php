{{-- Extendemos nuestro layout 
  -  Contiene las principales etiquetas HTML
  -	 Etiquetas como 'meta', 'body'...
  -	 También contiene algunas etiquetas para importar 
  -	 estilos CSS y funciones de JavaScript
--}}
@extends('layouts.main')


{{-- Secciones cortas.
   - title = título de la página.
   - meta-description = descripción de la página.  
--}}
@section('title', 'Crear un medico')
@section('meta-description', 'formulario para crear un nuevo medico')


{{-- Contenido Principal de la página web --}}
@section('content')
  <div class="content">
    <a href="{{ route('medico.index') }}" class="back"><i class="fi fi-rr-arrow-small-left"></i></a>
    <h2 class="title">Crear un nuevo médico</h2>

    <form method="POST" action="{{ route('medico.store') }}" class="form">
          @csrf
          <div class="textCamp">
              <div class="input-group">
                  <label class="label">Nombre del médico</label>
                  <input type="text" name="nombre" class="input" required="required">
              </div>
              <div class="input-group">
                  <label class="label">Apellido del médico</label>
                  <input type="text" name="apellido" class="input" required="required">
              </div>
              <div class="input-group">
                  <label class="label">Cédula del médico</label>
                  <input type="text" name="cedula" class="input" required="required">
              </div>
              <div class="input-group">
                  <label class="label">Sueldo del médico</label>
                  <input type="float" name="sueldo" class="input" required="required">
              </div>
          </div>

        <label class="label label--checkboxTitle">Especialidades</label>
          <div class="input-checkbox">
              @foreach ($especialidades as $item)
              <div class="checkbox-box">  
                <input type="checkbox" name="especialidades[]" value="{{ $item->id }}" class="checkbox">
                <p class="textCheckbox">{{ $item->nombre }}</p>
              </div>
              @endforeach
          </div>
          <div class="input-group">            
              <input type="submit" value="Guardar" class="input input--button">
          </div>
      </form>
  </div>
@endsection