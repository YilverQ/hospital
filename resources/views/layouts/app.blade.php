<!DOCTYPE html>
<html lang="es">
<head>
	<!--Metas-->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Yilver Quevedo">
	<meta name="description" content="@yield('meta-description', 'Página oficial del hospital de la UBV')">
	<meta name="theme-color" content="#179c52">
	
	<!--Title-->
	<title>Hospital UBV - @yield('title', 'Hospital')</title>
	
	<!--Estilos CSS-->
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
	@yield('cssFiles')
	
	<!--Icono de la web // Favicon-->
	<link rel="shortcut icon" type="image/x-icon" href="/favicon.png" />	
	
	<!--Importamos los iconos de Flaticon-->
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
        <p class="message message--success">{{ session('message-success') }}</p>
    @endif	
	<!-- Content -->
	@yield('content')

	<!--Enlaces JS-->
	@yield('jsFiles')
	<script type="module" src="{{ asset('js/message.js') }}"></script>
</body>
</html>