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
@section('title', 'Diagnostico {{ $diagnostico->nombre }}')
@section('meta-description', 'Características de {{ $diagnostico->nombre }}')

{{-- Contenido Principal de la página web --}}
@section('content')
    <div class="content">
        <a href="{{ route('diagnostico.index') }}" class="back"><i class="fi fi-rr-arrow-small-left"></i></a>
        <h2 class="title">Datos del diagnostico:  '{{ $diagnostico->nombre }}'</h2>
        <ul class="description">
          <li class="description__item">Nombre: {{ $diagnostico->nombre }}</li>
          <li class="description__item">Fecha de creación: {{ $diagnostico->created_at }}</li>
          <li class="description__item">Fecha de actualización: {{ $diagnostico->updated_at }}</li>
        </ul>

        <h2 class="subtitle">Pacientes que tienen asignado este diagnóstico</h2>
        <ul class="relation">
         @foreach ($pacientes as $item)
          <li class="relation__item">{{ $item->nombre }}</li>
        @endforeach
        </ul>

        <ul class="edit">
            <a href="{{ route('diagnostico.edit', $diagnostico) }}" class="item item--edit"><i class="fi fi-rr-edit"></i></a>
        </ul>
    </div>
@endsection