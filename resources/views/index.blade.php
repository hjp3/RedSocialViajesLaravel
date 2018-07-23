@extends('layouts.layout_principal')
@section('contenido')
  <section class="content">
    <h2>No tendrás un viaje aburrido!!</h2>
    @if (Auth::user())
        <h3>{{ Auth::user()->name }}</h3>
    @else  
        <h3></h3>
    @endif    
    <p class="intro"> Somos una Red Social que permite comunicarse con otras personas con tus mismos intereses y tus mismas posibilidades de viajar a distintas ciudades del mundo.</p>
    <p>Completá tus datos y ponete en contacto con gente cerca tuyo que quieren ir a dónde vas vos.</p>
    <h3 class="conectate">Conectate al mundo</h3>
  </section>

  
  <section>
    
    {{-- @if (Route::has('login')) --}}
        <div class="top-right links">
            {{-- @auth --}}

                <a href="{{ url('/home') }}">Home</a><br>
            {{-- @else --}}
            @if (Auth::guest())
                <a href="{{ route('login') }}">Login</a><br>
                <a href="{{ route('register') }}">Register</a><br>
            @else
                <a href="{{ route('logout') }}">Logout</a>
            @endif    
            {{-- @endauth --}}
        </div>
    
  </section>

@endsection('contenido')