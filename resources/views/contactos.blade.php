@extends('layouts.layout_principal')
@section('contenido')
  <section class="content">
    <h2>Comunicate con nosotros: escribimos tus comentarios, quejas, dudas, etc</h2>
    <br>
    <ul>
      <form action="{{ route('contactos.store') }}" class="form-group" method="POST" >
        @csrf
         
        <div class="form-group">
          mail: <input type="text" name="mail" value="{{ $categoria->nombre }}"><br>
          <textarea rows="4" cols="50"></textarea>
          <input type="submit" value="Submit">
          
          <button type="submit" class="btn btn-primary">Crear Etiqueta</button>
        </div>

          
      </form>
      <form action="/action_page.php" method="get">
        
      </form>
      
    </ul>
  </section>

@endsection('contenido')


