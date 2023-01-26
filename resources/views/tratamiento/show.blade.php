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
@section('title', 'Tratamiento {{ $tratamiento->nombre }}')
@section('meta-description', 'Características de {{ $tratamiento->nombre }}')

{{-- Contenido Principal de la página web --}}
@section('content')
<div class="content">
        <a href="{{ route('tratamiento.index') }}" class="back"><i class="fi fi-rr-arrow-small-left"></i></a>
        <h2 class="title">Datos del tratamiento:  '{{ $tratamiento->nombre }}'</h2>
        <ul class="description">
          <li class="description__item">Nombre: {{ $tratamiento->nombre }}</li>
          <li class="description__item">Fecha de creación: {{ $tratamiento->created_at }}</li>
          <li class="description__item">Fecha de actualización: {{ $tratamiento->updated_at }}</li>
        </ul>

        <h2 class="subtitle">Pacientes que tienen asignado este tratamiento</h2>
        <ul class="relation">
         @foreach ($pacientes as $item)
          <li class="relation__item">{{ $item->nombre }}</li>
        @endforeach
        </ul>

        <ul class="edit">
            <a href="{{ route('tratamiento.edit', $tratamiento) }}" class="item item--edit"><i class="fi fi-rr-edit"></i></a>
        </ul>
    </div>
@endsection