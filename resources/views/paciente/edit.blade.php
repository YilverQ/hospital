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
@section('title', 'Editar de la paciente {{ $paciente->nombre }}')
@section('meta-description', 'Editar de la paciente')

{{-- Contenido Principal de la página web --}}
@section('content')
    <div class="content">
        <a href="{{ route('paciente.index') }}" class="back"><i class="fi fi-rr-arrow-small-left"></i></a>
        <h2 class="title">Editar el paciente: {{ $paciente->nombre }}</h2>


        <form method="POST" action="{{ route('paciente.update', $paciente) }}" class="form">
          @csrf  @method('PUT')
          <div class="textCamp">
              <div class="input-group">
                  <label class="label">Nombre del paciente</label>
                  <input type="text" name="nombre" class="input" value="{{ $paciente->nombre }}" required="required">
              </div>
              <div class="input-group">
                  <label class="label">Apellido del paciente</label>
                  <input type="text" name="apellido" class="input" value="{{ $paciente->apellido }}" required="required">
              </div>
              <div class="input-group">
                  <label class="label">Cédula del paciente</label>
                  <input type="text" name="cedula" class="input" value="{{ $paciente->cedula }}" required="required">
              </div>
              <div class="input-group">
                  <label class="label">Email del paciente</label>
                  <input type="email" name="sueldo" class="input" value="{{ $paciente->email }}" required="required">
              </div>
          </div>

        <label class="label label--checkboxTitle">Sus médicos</label>
          <div class="input-checkbox">
              @foreach ($medicos as $item)
              @if (array_search($item->nombre, $sus_medicos) !== false)
                <div class="checkbox-box checkbox-box--checked">  
                  <input type="checkbox" name="medicos[]" value="{{ $item->id }}" class="checkbox">
                  <p class="textCheckbox">{{ $item->nombre }}</p>
                </div>
              @else
                <div class="checkbox-box">  
                  <input type="checkbox" name="medicos[]" value="{{ $item->id }}" class="checkbox">
                  <p class="textCheckbox">{{ $item->nombre }}</p>
                </div>
              @endif
              @endforeach
          </div>


          <label class="label label--checkboxTitle">Sus diagnósticos</label>
          <div class="input-checkbox">
              @foreach ($diagnosticos as $item)
              @if (array_search($item->nombre, $sus_diagnosticos) !== false)
                <div class="checkbox-box checkbox-box--checked">  
                  <input type="checkbox" name="diagnosticos[]" value="{{ $item->id }}" class="checkbox">
                  <p class="textCheckbox">{{ $item->nombre }}</p>
                </div>
              @else
                <div class="checkbox-box">  
                  <input type="checkbox" name="diagnosticos[]" value="{{ $item->id }}" class="checkbox">
                  <p class="textCheckbox">{{ $item->nombre }}</p>
                </div>
              @endif
              @endforeach
          </div>

          <label class="label label--checkboxTitle">Sus tratamientos</label>
          <div class="input-checkbox">
              @foreach ($tratamientos as $item)
              @if (array_search($item->nombre, $sus_tratamientos) !== false)
                <div class="checkbox-box checkbox-box--checked">  
                  <input type="checkbox" name="tratamientos[]" value="{{ $item->id }}" class="checkbox" checked>
                  <p class="textCheckbox">{{ $item->nombre }}</p>
                </div>
              @else
                <div class="checkbox-box">  
                  <input type="checkbox" name="tratamientos[]" value="{{ $item->id }}" class="checkbox">
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