@extends('layouts.layout_viaje')

@section('titulo','Crear viaje')

@section('contenido')
<form action="/viaje" class="form-group" method="POST" enctype="multipart/form-data">
	 @csrf
	 @if($errors->any()) 
	 	<div class="alert alert-danger"> 
	 		<ul>
	 			@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach		
	 		</ul>
		</div>
	@endif
	<div class="form-group">
		<label for="titulo">Título</label>
		<input type="text" class="form-control" name="titulo">
		<label for="descripcion">Descripción</label>
		<textarea name="descripcion" rows="10" cols="40" class="form-control"></textarea>
		<label for="fecha_partida">Fecha Partida</label>
		<input type="text" class="form-control" name="fecha_partida">
		<label for="fecha_regreso">Fecha Regreso</label>
		<input type="text" class="form-control" name="fecha_regreso">
		<label for="portada">Portada</label>
		<input type="file" class="form-control" name="portada">
	</div>

	<button type="submit" class="btn btn-primary">Guardar</button>	
</form>


@endsection

