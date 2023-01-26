<!DOCTYPE html>
<html lang="es">
<head>
	<!--Metas-->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Yilver Quevedo">
	<meta name="description" content="@yield('meta-description', 'Página oficial del hospital de la UBV')">
	<meta name="theme-color" content="#3d5a80">
	
	<!--Title-->
	<title>Hospital UBV - @yield('title', 'Hospital')</title>
	
	<!--Estilos CSS-->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/nav.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/all.css') }}">
	@yield('cssFiles')
	
	<!--Icono de la web // Favicon-->
	<link rel="shortcut icon" type="image/x-icon" href="/favicon.png" />	
	
	<!--Importamos los iconos de Flaticon-->
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
	<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
	@yield('icons')

	<!--Importamos las fuentes-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Raleway&family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
	@if (session('message-error'))
        <p class="message message--error">{{ session('message-error') }} <i class="fi fi-rr-cross-circle botonIcon" id="botonIcon"></i></p>
    @endif	
    @if (session('message-success'))
        <p class="message message--success">{{ session('message-success') }} <i class="fi fi-rr-cross-circle botonIcon" id="botonIcon"></i></p>
    @endif

	<!-- Menú -->
	<header class="header">
		<a href="/"><h2 class="header__title">UBV Hospital</h2></a>
		<ul class="nav">
			<a href="{{ route('medico.index') }}" class="nav__item">
				<img src="{{ asset('img/medicos.png') }}" class="nav__img">
				<li class="nav__item-title">Gestionar Médicos</li>
			</a>
			<a href="{{ route('especialidad.index') }}" class="nav__item">
				<img src="{{ asset('img/especialidades.png') }}" class="nav__img">
				<li class="nav__item-title">Gestionar Especialidades</li>
			</a>
			<a href="{{ route('paciente.index') }}" class="nav__item">
				<img src="{{ asset('img/pacientes.png') }}" class="nav__img">
				<li class="nav__item-title">Gestionar Pacientes</li>
			</a>
			<a href="{{ route('diagnostico.index') }}" class="nav__item">
				<img src="{{ asset('img/diagnosticos.png') }}" class="nav__img">
				<li class="nav__item-title">Gestionar Diagnósticos</li>
			</a>
			<a href="{{ route('tratamiento.index') }}" class="nav__item">
				<img src="{{ asset('img/tratamientos.png') }}" class="nav__img">
				<li class="nav__item-title">Gestionar Tratamientos</li>
			</a>
			<a href="{{ route('logout') }}" class="nav__item">
				<img src="{{ asset('img/logout.png') }}" class="nav__img">
				<li class="nav__item-title">Salir de la aplicación</li>
			</a>
		</ul>
	</header>

	<!-- Content -->
	@yield('content')

	<!--Enlaces JS-->
	@yield('jsFiles')
	<script type="module" src="{{ asset('js/message.js') }}"></script>
	<script type="module" src="{{ asset('js/checkbox.js') }}"></script>
</body>
</html>