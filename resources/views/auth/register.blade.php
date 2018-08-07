@extends('layouts.layout_principal')
@section('contenido')
<section class="content">

<h3 class="conectate">FORMULARIO DE REGISTRO</h3>
  <form class="" action="{{ route('register') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="">
      <label for="">Nombre</label>
      <input type="text" name="name" value="">
    </div>
    <div class="">
      <label for="">Usuario</label>
      <input type="text" name="usuario" value="">
    </div>
    <div class="">
      <label for="">E-Mail</label>
      <input type="text" name="email" value="">
    </div>
    <div class="">
      <label for="">Password</label>
      <input type="password" name="password" value="">
    </div>
    <div class="">
      <label for="">Confirmar Password</label>
      <input type="password" name="password_confirmation" value="">
    </div>
    <div class="">
      <label for="">Avatar</label>
      <input type="file" name="img" value="">
    </div>
    <button type="submit" name="button">Enviar</button>
  </form>
</section>
@endsection('contenido')
