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
@section('title', 'Crear un diagnostico')
@section('meta-description', 'formulario para crear un nuevo diagnostico')

{{-- Contenido Principal de la página web --}}
@section('content')

<div class="content">
    <a href="{{ route('diagnostico.index') }}" class="back"><i class="fi fi-rr-arrow-small-left"></i></a>
    <h2 class="title">Crear un nuevo diangóstico</h2>

    <form method="POST" action="{{ route('diagnostico.store') }}" class="form">
          @csrf
          <div class="textCamp textCamp--one">
              <div class="input-group">
                  <label class="label">Nombre del diagnóstico</label>
                  <input type="text" name="nombre" class="input" required="required">
              </div>
          </div>
          <div class="input-group">
              <input type="submit" value="Guardar" class="input input--button">
          </div>
      </form>
  </div>
@endsection