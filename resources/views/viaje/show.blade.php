@extends('layouts.layout_principal')

@section('titulo','Viaje')

@section('contenido')
	<div class="text-center">
		<h1 class="card-title">{{ $viaje->titulo }}</h1>
		<br>
		<img class="card-img-top mx-auto d-block" style="width:300px;height:300px" src="/img/portada/{{$viaje->portada}}" alt="imagen de la portada">
		<br>	
	    <h3 class="card">{{ $viaje->descripcion }}</h3>
    	<br>
    	<h3 class="card">Fecha de Partida: {{ $viaje->fecha_partida }}</h3>
    	<h3 class="card">Fecha de Regreso: {{ $viaje->fecha_regreso }}</h3>
    	<br>
    	<a href="/viaje" class="btn btn-primary">Volver</a>
    	{{-- creamos un registro user-viaje --}}
    	<a href="#" class="btn btn-primary">Sumate</a>
		<a href="/viaje/{{ $viaje->id }}/edit" class="btn btn-primary">Editar</a>
		<form action="/viaje/{{ $viaje->id }}" method="post">
			{{ csrf_field() }}
			{{method_field('delete')}}
			<button type="submit" class="btn btn-danger">Borrar</button>
		</form>
	</div>		    	
			    
	
@endsection


