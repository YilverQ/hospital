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
@section('title', 'Medico {{ $medico->nombre }}')
@section('meta-description', 'Características de {{ $medico->nombre }}')

{{-- Contenido Principal de la página web --}}
@section('content')
    <div class="content">
        <a href="{{ route('medico.index') }}" class="back"><i class="fi fi-rr-arrow-small-left"></i></a>
        <h2 class="title">Datos del medico:  '{{ $medico->nombre }}'</h2>
        <ul class="description">
          <li class="description__item">Nombre: {{ $medico->nombre }}</li>
          <li class="description__item">Apellido: {{ $medico->apellido }}</li>
          <li class="description__item">Cédula: {{ $medico->cedula }}</li>
          <li class="description__item">Sueldo: {{ $medico->sueldo }}$</li>
          <li class="description__item">Fecha de creación: {{ $medico->created_at }}</li>
          <li class="description__item">Fecha de actualización: {{ $medico->updated_at }}</li>
        </ul>

        <h2 class="subtitle">Especialidades</h2>
        <ul class="relation">
         @foreach ($especialidades as $item)
          <li class="relation__item">{{ $item->nombre }}</li>
        @endforeach
        </ul>

        <ul class="edit">
            <a href="{{ route('medico.edit', $medico) }}" class="item item--edit"><i class="fi fi-rr-edit"></i></a>
        </ul>
    </div>
@endsection