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
@section('title', 'Diagnostico {{ $especialidad->nombre }}')
@section('meta-description', 'Características de {{ $especialidad->nombre }}')

{{-- Contenido Principal de la página web --}}
@section('content')
    <div class="content">
        <a href="{{ route('especialidad.index') }}" class="back"><i class="fi fi-rr-arrow-small-left"></i></a>
        <h2 class="title">Datos de la especialidad:  '{{ $especialidad->nombre }}'</h2>
        <ul class="description">
          <li class="description__item">Nombre: {{ $especialidad->nombre }}</li>
          <li class="description__item">Fecha de creación: {{ $especialidad->created_at }}</li>
          <li class="description__item">Fecha de actualización: {{ $especialidad->updated_at }}</li>
        </ul>

        <h2 class="subtitle">Médicos especializados</h2>
        <ul class="relation">
         @foreach ($medicos as $item)
          <li class="relation__item">{{ $item->nombre }}</li>
        @endforeach
        </ul>

        <ul class="edit">
            <a href="{{ route('especialidad.edit', $especialidad) }}" class="item item--edit"><i class="fi fi-rr-edit"></i></a>
        </ul>
    </div>
@endsection