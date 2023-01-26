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
@section('title', 'Editar de la medico {{ $medico->nombre }}')
@section('meta-description', 'Editar de la medico')

{{-- Contenido Principal de la página web --}}
@section('content')
    <div class="content">
        <a href="{{ route('medico.index') }}" class="back"><i class="fi fi-rr-arrow-small-left"></i></a>
        <h2 class="title">Editar al médico: {{ $medico->nombre }}</h2>


        <form method="POST" action="{{ route('medico.update', $medico) }}" class="form">
          @csrf  @method('PUT')
          <div class="textCamp">
              <div class="input-group">
                  <label class="label">Nombre del médico</label>
                  <input type="text" name="nombre" class="input" value="{{ $medico->nombre }}" required="required">
              </div>
              <div class="input-group">
                  <label class="label">Apellido del médico</label>
                  <input type="text" name="apellido" class="input" value="{{ $medico->apellido }}" required="required">
              </div>
              <div class="input-group">
                  <label class="label">Cédula del médico</label>
                  <input type="text" name="cedula" class="input" value="{{ $medico->cedula }}" required="required">
              </div>
              <div class="input-group">
                  <label class="label">Sueldo del médico</label>
                  <input type="float" name="sueldo" class="input" value="{{ $medico->sueldo }}" required="required">
              </div>
          </div>

        <label class="label label--checkboxTitle">Especialidades</label>
          <div class="input-checkbox">
              @foreach ($especialidades as $item)
              @if (array_search($item->nombre, $collection) !== false)
                <div class="checkbox-box checkbox-box--checked">  
                  <input type="checkbox" name="especialidades[]" value="{{ $item->id }}" class="checkbox" checked>
                  <p class="textCheckbox">{{ $item->nombre }}</p>
                </div>
              @else
                <div class="checkbox-box">  
                  <input type="checkbox" name="especialidades[]" value="{{ $item->id }}" class="checkbox">
                  <p class="textCheckbox">{{ $item->nombre }}</p>
                </div>
              @endif
              @endforeach
          </div>
          <div class="input-group">            
              <input type="submit" value="Actualizar" class="input input--button">
          </div>
      </form>
    </div>
@endsection