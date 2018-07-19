@extends('layouts.layout_principal')
@section('contenido')
  <section class="content">
    <h2>No tendrás un viaje aburrido!!</h2>
    <p class="intro"> Red Social que permite comunicarse con otras personas con mismos intereses y  posibilidades de viajar a distintas ciudades del mundo.</p>
    <p>Completá tus datos y ponete en contacto con gente cerca tuyo que quieren ir a dónde vas vos.</p>
    <h3 class="conectate">Conectate al mundo</h3>
  </section>

  <section class="login registrado">
      <a href='logout.php'>Logout</a>
      <br>
      
      <a href="bienvenida.php">Volver a tu página personal </a>
  </section>
  <section>
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    @endif
  </section>

@endsection('contenido')