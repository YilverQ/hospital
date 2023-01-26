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
@section('title', 'Medico {{ $paciente->nombre }}')
@section('meta-description', 'Características de {{ $paciente->nombre }}')

{{-- Contenido Principal de la página web --}}
@section('content')
<div class="content">
        <a href="{{ route('paciente.index') }}" class="back"><i class="fi fi-rr-arrow-small-left"></i></a>
        <h2 class="title">Datos del paciente:  '{{ $paciente->nombre }}'</h2>
        <ul class="description">
          <li class="description__item">Nombre: {{ $paciente->nombre }}</li>
          <li class="description__item">Apellido: {{ $paciente->apellido }}</li>
          <li class="description__item">Cédula: {{ $paciente->cedula }}</li>
          <li class="description__item">Email: {{ $paciente->email }}</li>
          <li class="description__item">Fecha de creación: {{ $paciente->created_at }}</li>
          <li class="description__item">Fecha de actualización: {{ $paciente->updated_at }}</li>
        </ul>

        <h2 class="subtitle">Sus médicos</h2>
        <ul class="relation">
         @foreach ($medicos as $item)
          <li class="relation__item">{{ $item->nombre }}</li>
        @endforeach
        </ul>

        <h2 class="subtitle">Sus diagnósticos</h2>
        <ul class="relation">
         @foreach ($diagnosticos as $item)
          <li class="relation__item">{{ $item->nombre }}</li>
        @endforeach
        </ul>

        <h2 class="subtitle">Sus tratamientos</h2>
        <ul class="relation">
         @foreach ($tratamientos as $item)
          <li class="relation__item">{{ $item->nombre }}</li>
        @endforeach
        </ul>

        <ul class="edit">
            <a href="{{ route('paciente.edit', $paciente) }}" class="item item--edit"><i class="fi fi-rr-edit"></i></a>
        </ul>
  </div>
@endsection