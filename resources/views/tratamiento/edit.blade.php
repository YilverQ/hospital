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
@section('title', 'Editar el tratamiento {{ $tratamiento->nombre }}')
@section('meta-description', 'Editar el tratamiento')

{{-- Contenido Principal de la página web --}}
@section('content')
    <div class="content">
        <a href="{{ route('tratamiento.index') }}" class="back"><i class="fi fi-rr-arrow-small-left"></i></a>
        <h2 class="title">Editar el tratamiento: {{ $tratamiento->nombre }}</h2>


        <form method="POST" action="{{ route('tratamiento.update', $tratamiento) }}" class="form">
          @csrf  @method('PUT')
          <div class="textCamp textCamp--one">
              <div class="input-group">
                  <label class="label">Nombre del tratamiento</label>
                  <input type="text" name="nombre" class="input" value="{{ $tratamiento->nombre }}" required="required">
              </div>
          </div>
          <div class="input-group">            
              <input type="submit" value="Actualizar" class="input input--button">
          </div>
      </form>
    </div>
@endsection