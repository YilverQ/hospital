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
@section('title', 'Inicio')
@section('meta-description', 'La UBV ya tiene su propio hospital, goza de todas las ventajas de nuestro hospital')


{{-- Estilos --}}
@section('cssFiles')
    <link rel="stylesheet" type="text/css" href="css/home.css">
@endsection


{{-- Contenido Principal de la página web --}}
@section('content')
    <div class="content">
        <img src="./img/hospital.png" class="img">
        <div class="information">
            <p class="information__parrafo">UBV ha crecido mucho desde su creación. En este 2023, con 17 años de aniversario esteremos celebrando el inicio de nuestro propio hospital para antender a nuestra población y saciar la necesidad médica de nuestra nación. Se ha aperturado 12 módulos farmacéuticos y 5 carreras a fines a la medicina.</p>
            <p class="information__parrafo">Esta es nuestra plataforma administrativa con la cual podrás gestionar el personal médico, sus especialidades, pacientes de la comunidad, diagnósticos médicos y tratamientos.</p>
        </div>
    </div>
@endsection