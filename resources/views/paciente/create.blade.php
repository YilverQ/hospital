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
@section('title', 'Crear un paciente')
@section('meta-description', 'formulario para crear un nuevo paciente')

{{-- Contenido Principal de la página web --}}
@section('content')
	<div class="content">
    <a href="{{ route('paciente.index') }}" class="back"><i class="fi fi-rr-arrow-small-left"></i></a>
    <h2 class="title">Crear un nuevo paciente</h2>

    <form method="POST" action="{{ route('paciente.store') }}" class="form">
          @csrf
          <div class="textCamp">
              <div class="input-group">
                  <label class="label">Nombre del paciente</label>
                  <input type="text" name="nombre" class="input" required="required">
              </div>
              <div class="input-group">
                  <label class="label">Apellido del paciente</label>
                  <input type="text" name="apellido" class="input" required="required">
              </div>
              <div class="input-group">
                  <label class="label">Cédula del paciente</label>
                  <input type="text" name="cedula" class="input" required="required">
              </div>
              <div class="input-group">
                  <label class="label">Email del paciente</label>
                  <input type="email" name="email" class="input" required="required">
              </div>
          </div>

        <label class="label label--checkboxTitle">Médicos</label>
          <div class="input-checkbox">
              @foreach ($medicos as $item)
              <div class="checkbox-box">  
                <input type="checkbox" name="medicos[]" value="{{ $item->id }}" class="checkbox">
                <p class="textCheckbox">{{ $item->nombre }}</p>
              </div>
              @endforeach
          </div>

        <label class="label label--checkboxTitle">Diagnósticos</label>
          <div class="input-checkbox">
              @foreach ($diagnosticos as $item)
              <div class="checkbox-box">  
                <input type="checkbox" name="diagnosticos[]" value="{{ $item->id }}" class="checkbox">
                <p class="textCheckbox">{{ $item->nombre }}</p>
              </div>
              @endforeach
          </div>

          <label class="label label--checkboxTitle">Tratamientos</label>
          <div class="input-checkbox">
              @foreach ($tratamientos as $item)
              <div class="checkbox-box">  
                <input type="checkbox" name="tratamientos[]" value="{{ $item->id }}" class="checkbox">
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