@extends('layouts.layout_principal')

@section('titulo','Editar Viaje')

@section('contenido')
<form action="/users/{{ $user->id }}" class="form-group" method="POST" enctype="multipart/form-data">
	{{method_field('PATCH')}}
	@csrf
	@if($errors->any())
		@foreach($errors->all() as $error)
			<p>{{ $error }}</p>
		@endforeach
	@endif
	<div class="form-group">
		<label for="titulo">Nombre</label>
		<input type="text" class="form-control" name="name" value="{{ $user->name }}">
		<label for="descripcion">Usuario</label>
		<input type="text" class="form-control" name="usuario" value="{{ $user->usuario }}">
		<label for="descripcion">Email</label>
		<input type="text" class="form-control" name="email" value="{{ $user->email }}">
		<label for="password">Password</label>
		<input type="password" name="password" class="form-control" readonly value="{{ $user->password }}"/>

        <input type="hidden" class="form-control" name="old_avatar" value="{{ $user->avatar }}">
		<label for="fecha_regreso">Foto</label>
		<input type="file" class="form-control" name="avatar">
	</div>

	<button type="submit" class="btn btn-primary">Actualizar</button>
</form>


@endsection
