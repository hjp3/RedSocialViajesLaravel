@extends('layouts.layout_viaje')

@section('titulo','Viaje')

@section('contenido')
	<div class="text-center">
		<h1 class="card-title">{{ $user->name }}</h1>
		<br>
		<img class="card-img-top mx-auto d-block" style="width:300px;height:300px" src="{{$user->avatar}}" alt="imagen de la portada">
		<br>	
	    <h3 class="card">{{ $user->usuario }}</h3>
    	<br>
    	<br>
    	<a href="/users" class="btn btn-primary">Volver</a>
    	<a href="/users/{{ $user->id }}/edit" class="btn btn-primary">Editar</a>
		<form action="/users/{{ $user->id }}" method="post">
			{{ csrf_field() }}
			{{method_field('delete')}}
			<button type="submit" class="btn btn-danger">Borrar</button>
		</form>
	</div>		    	
			    
	
@endsection


