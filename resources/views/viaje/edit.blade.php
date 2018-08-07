@extends('layouts.layout_principal')



@section('contenido')
<form action="/viaje/{{ $viaje->id }}" class="form-group" method="POST" enctype="multipart/form-data">
	{{method_field('PATCH')}} 
	@csrf
	@if($errors->any())  
		@foreach($errors->all() as $error)
			<p>{{ $error }}</p>
		@endforeach
	@endif
	<div class="form-group">
		<label for="titulo">Título</label>
		<input type="text" class="form-control" name="titulo" value="{{ $viaje->titulo }}">
		<label for="descripcion">Descripción</label>
		<textarea name="descripcion" rows="10" cols="40" class="form-control" >{{ $viaje->descripcion }}</textarea>
		<label for="fecha_partida">Fecha Partida</label>
		<input type="text" class="form-control" name="fecha_partida" value="{{ $viaje->fecha_partida }}">
		<label for="fecha_regreso">Fecha Regreso</label>
		<input type="text" class="form-control" name="fecha_regreso" value="{{ $viaje->fecha_regreso }}">
		<label for="fecha_regreso">Avatar</label>
		<input type="file" class="form-control" name="portada">
	</div>

	<button type="submit" class="btn btn-primary">Actualizar</button>	
</form>


@endsection

