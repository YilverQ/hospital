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
@section('title', 'Medicos')
@section('meta-description', 'Lista de medicos que el hospital de la UBV puede trabajar')


{{-- Contenido principal de la página web --}}
@section('content')
  <div class="content">
    <h2 class="title">Gestionar médicos</h2>
    <div class="box">
        <a href="{{ route('medico.create') }}" class="item item--create">+ Crear un nuevo médico</a>
        <ul class="box__list">
        @foreach ($medicos as $item)
            <li class="box__item">
                <p>{{ $item->nombre }}</p>
                <div class="box__crud-display">
                    <a href="{{ route('medico.show', $item) }}" class="item item--show"><i class="fi fi-rr-eye"></i></a> 
                    <a href="{{ route('medico.edit', $item) }}" class="item item--edit"><i class="fi fi-rr-edit"></i></a>
                    <form action="{{ route('medico.destroy', $item) }}" method="POST" class="form__delete">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="item item--delete"><i class="fi fi-rr-trash iconTrash"></i></button>                
                    </form> 
                </div> 
            </li>
        @endforeach
        </ul>
    </div>
  </div>
@endsection