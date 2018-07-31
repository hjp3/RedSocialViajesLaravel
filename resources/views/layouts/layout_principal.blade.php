<?php

namespace App\Http\Controllers\Auth;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Group Trip</title>
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Titan+One" rel="stylesheet">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

  </head>
  <body>
    <div class="container">
      <section class="left">
        <div class="header-class">
          <h1><img src="img/web/avion1-50.jpg"><a href="{{ url('/') }}">Group Trip</a></h1>
          <nav class="nav">
            <ul>
              <li><a href="{{ url('/quienes_somos') }}" class="btn">Quienes Somos</a></li>
              <li><a href="{{route('viaje.index')}}" class="btn">Proximos Viajes</a></li>
              <li><a href="{{ url('/contactos') }}" class="btn">Contactanos</a></li>
              <li><a href="{{ url('/faq') }}" class="btn"> F.A.Q.</a></li>
              @if (Auth::user())
                <li><a href="{{ url('/home') }}"><img src="{{ Auth::user()->avatar }}" alt="" style="width: 40px"></li>
                <li><a href="{{ route('blog') }}" class="btn">Blog</a></li>
              @endif
            </ul>
          </nav>
        </div>
        {{-- tenemos una variable de sesión flash para mensajes previos al contenido, desaparece cuando actualizamos --}}
        @if(session('info'))
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <div class="alert alert-success">
                  {{ session('info') }}
                </div>
              </div>
            </div>
          </div>
        @endif

        {{-- tenemos el manejo de errores , con la variable global $errors --}}
        {{-- si hay al menos un error, lo mostramos por pantalla --}}
        {{-- recorremos a la variable $errors con un foreach --}}
        @if(count($errors))
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <div class="alert alert-danger">
                  <ul>
                    @foreach($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
          </div>
        @endif

        @yield('contenido')
      </section>
      <aside class="right">
      </aside>
    </div>
  </body>

</html>