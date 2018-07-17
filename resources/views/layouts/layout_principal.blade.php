<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Group Trip</title>
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Titan+One" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  </head>
  <body>
    <header>
      <div class="header-class">
        <h1><img src="img/web/avion1-50.jpg"><a href="home.php">Group Trip</a></h1>
        <nav class="nav">
          <ul>
            <li><a href="quienesSomos.php" class="btn">Quienes Somos</a></li>
            <li><a href="proximosViajes.php" class="btn">Proximos Viajes</a></li>
            <li><a href="contacto.php" class="btn">Contactanos</a></li>
            <li><a href="faq.php" class="btn"> F.A.Q.</a></li>
          </ul>
        </nav>
    </header>
  	<main>
  		@yield('contenido')
  	</main>
    <div class="container">
      <section class="left">
        
        
      </section>
      <aside class="right">
      </aside>
    </div>
  </body>

</html>
