@extends('layouts.layout_principal')
@section('contenido')
  <section class="content">
    <h2>No tendrás un viaje aburrido!!</h2>
    @if (Auth::user())
        <h3>{{ Auth::user()->name }}</h3>
    @else
        <h3></h3>
    @endif

    <p>Completá tus datos y ponete en contacto con gente que quiere ir a donde vas vos</p>
      <br>
      <br>
      <br>
      


    <h3 class="conectate">Conectate al mundo</h3>
  </section>


  <section>

    {{-- @if (Route::has('login')) --}}
        <div class="top-right links">
            {{-- @auth --}}


            {{-- @else --}}
            @if (Auth::guest())
                <a href="{{ route('login') }}"> -> Logueate   :)</a><br>
                <a href="{{ route('register') }}">  -> Registrate   :)</a><br>
            @elseif (Auth::user()->email == "admin@admin.com")
                <a href="{{ url('/admin') }}">Panel Administración</a><br>
            @else
                <a href="{{ url('/home') }}">Home</a><br>
                <a href="{{ route('logout') }}">Logout</a>
            @endif
            {{-- @endauth --}}
        </div>

  </section>

@endsection('contenido')
