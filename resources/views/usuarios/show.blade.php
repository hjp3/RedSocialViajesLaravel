@extends('layouts.layout_principal')


@section('contenido')
	<div class="text-center">
		<h1 class="title">{{ $user->name }}</h1>
		<br>
		<img class=" mx-auto d-block" style="width:300px;height:300px" src="{{$user->avatar}}" alt="imagen de la portada">
		<br>	
	    <h3 class="">Nombre de Usuario: {{ $user->usuario }}</h3>
    	<br>	
	    <h3 class="">Email: {{ $user->email }}</h3>

		<p>Número de Posteos realizados: {{ $posteos->count() }}</p>
		<a href="{{ url('/blogUsuario',['id'=> $user->id]) }}" class="btn btn-primary">Ver Posteos</a>	
		
		<p>Numero de Viajes a los que se sumó: {{ $user->viajes()->count() }}</p>
		    @foreach ($user->viajes as $viaje)
		        <h4><a href="/viaje/{{$viaje->id}}">{{ $viaje->titulo }}</a></h4>
		        <p><img class="card-img-top mx-auto d-block" style="width:30px;height:30px" src="{{$viaje->portada}}" alt="imagen del usuario"></p>
		    @endforeach
    	<br>
    	@if (Auth::user()->email == "admin@admin.com")
			<form action="/users/{{ $user->id }}" method="post">
				{{ csrf_field() }}
				{{method_field('delete')}}
				<button type="submit" class="btn btn-danger">Borrar</button>
			</form>
		@endif	
		<br>
		<a href="/users" class="btn btn-primary">Volver</a>	
	</div>		    	
			    
	
@endsection


