{{-- Extendemos nuestro layout 
  -  Contiene las principales etiquetas HTML
  -	 Etiquetas como 'meta', 'body'...
  -	 También contiene algunas etiquetas para importar 
  -	 estilos CSS y funciones de JavaScript
--}}
@extends('layouts.app')


{{-- Secciones cortas.
   - title = título de la página.
   - meta-description = descripción de la página.  
--}}
@section('title', 'Login')
@section('meta-description', 'Página para acceder a la plataforma web, debes ingresar tus credenciales')


{{-- Importamos los estilos --}}
@section('cssFiles')
	<link rel="stylesheet" type="text/css" href="css/login.css">
@endsection


{{-- Importamos los iconos --}}
@section('icons')
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
@endsection

{{-- Contenido Principal de la página web --}}
@section('content')
	<div class="content">
	<div class="formLogin">
		<i class="fi fi-br-user iconUser"></i>
		<h1 class="formLogin__title">Login</h1>
		<p class="formLogin__description">Ingresa tus credenciales para ingresar a la plataforma</p>
		<form method="POST" action="{{ route('login.auth') }}" class="form">
		@csrf
			<div class="input-group">
	    		<label class="label">username</label>
	    		<input autocomplete="off" name="username" id="username" class="input" type="text" required="required">
			</div>
			<div class="input-group">
	    		<label class="label">password</label>
	    		<input autocomplete="off" name="password" id="password" class="input" type="password" required="required">
			</div>
			
			<div class="blockInput">
				<input type="submit" value="Ingresar" class="input input--button">
			</div>
		</form>
	</div>
	</div>
@endsection
