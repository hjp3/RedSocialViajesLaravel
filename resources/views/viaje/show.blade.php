@extends('layouts.layout_principal')


@section('contenido')
<style type="text/css">
  a:link, a:hover{ 
	text-decoration:none; 
	} 
   
  
</style>
	<div class="text-center">
		<h1 class="card-title">{{ $viaje->titulo }}</h1>
		<br>
		<img class="card-img-top mx-auto d-block" style="width:300px;height:300px" src="{{$viaje->portada}}" alt="imagen de la portada">
		<br>	
	    <h3 class="">{{ $viaje->descripcion }}</h3>
    	<br>
    	<h3 class="">Fecha de Partida: {{ $viaje->fecha_partida }}</h3>
    	<h3 class="">Fecha de Regreso: {{ $viaje->fecha_regreso }}</h3>
    	<br>
    	<h3>Viajeros Confirmados:{{ $viaje->users()->count() }} </h3>
    	<br>
    	    @foreach ($viaje->users as $user)
		        <h4><a href="/users/{{$user->id}}">{{ $user->name }}</a></h4>
		        <p><img class="card-img-top mx-auto d-block" style="width:30px;height:30px" src="{{$user->avatar}}" alt="imagen del usuario"></p>
		    @endforeach
		
		<br>
		<a href="/viaje" class="btn btn-primary">Volver</a>
    	@if (Auth::user()->email == "admin@admin.com")
			<a href="/viaje/{{ $viaje->id }}/edit" class="btn btn-primary">Editar</a>
			<form action="/viaje/{{ $viaje->id }}" method="post">
				{{ csrf_field() }}
				{{method_field('delete')}}
			<button type="submit" class="btn btn-danger">Borrar</button>
			</form>
		@else
			{{-- {{dd($viaje->id)}} --}}
			<a href="/anotarUsuarioViaje/{{Auth::user()->id}}/{{ $viaje->id }}" class="btn btn-primary">Sumate</a>
			<a href="/borrarUsuarioViaje/{{Auth::user()->id}}/{{ $viaje->id }}" class="btn btn-primary">Borrate</a>
			
		@endif
				
	</div>		    	
			    
	
@endsection


