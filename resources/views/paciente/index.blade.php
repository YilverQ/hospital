{{-- Extendemos nuestro layout 
  -  Contiene las principales etiquetas HTML
  -  Etiquetas como 'meta', 'body'...
  -  También contiene algunas etiquetas para importar 
  -  estilos CSS y funciones de JavaScript
--}}
@extends('layouts.main')


{{-- Secciones cortas.
   - title = título de la página.
   - meta-description = descripción de la página.  
--}}
@section('title', 'Pacientes')
@section('meta-description', 'Lista de pacientes que el hospital de la UBV puede trabajar')


{{-- Estilos --}}
@section('cssFiles')
    <link rel="stylesheet" type="text/css" href="css/gestionar.css">
@endsection

{{-- Contenido principal de la página web --}}
@section('content')
  <div class="content">
    <h2 class="title">Gestionar pacientes</h2>
    <div class="box">
        <a href="{{ route('paciente.create') }}" class="item item--create"><li>+ Crear un nuevo paciente</li></a>
        <ul class="box__list">
        @foreach ($pacientes as $item)
            <li class="box__item">
                <p>{{ $item->nombre }}</p>
                <div class="box__crud-display">
                    <a href="{{ route('paciente.show', $item) }}" class="item item--show"><i class="fi fi-rr-eye"></i></a> 
                    <a href="{{ route('paciente.edit', $item) }}" class="item item--edit"><i class="fi fi-rr-edit"></i></a>
                    <form action="{{ route('paciente.destroy', $item) }}" method="POST" class="form__delete">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="item item--delete"><i class="fi fi-rr-trash"></i></button>                
                    </form> 
                </div> 
            </li>
        @endforeach
        </ul>
    </div>
  </div>
@endsection