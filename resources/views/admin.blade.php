@extends('layouts.layout_principal')
@section('contenido')
  <section class="content">
    <h2>Panel de Administración</h2>
    <br>
    <ul>
      <li><a href="{{route('viaje.create')}}" class="btn"><h3>Crear Viaje</h3></a></li>
      <li><a href="{{route('viaje.index')}}" class="btn"><h3>Listar Viajes</h3></a></li>
      <li><a href="{{route('users.index')}}" class="btn"><h3>Listar Usuarios</h3></a></li>
      <li><a href="{{ route('logout') }}">Logout</a></li>
      <li><a href="{{ url('/') }}">Página Principal</a></li>
    </ul>
  </section>

@endsection('contenido')