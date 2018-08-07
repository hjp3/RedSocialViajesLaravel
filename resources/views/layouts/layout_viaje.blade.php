<html>
	<head>
		<title>Viaje @yield('titulo')</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
	</head>
	<body>
		<nav class="navbar navbar-dark bg-primary">
			<a href="#" class="navbar-brand">Red Social Viajes</a>
		</nav>
		<div class="container">
			@yield('contenido')
		</div>
		
	</body>
</html>