@extends('layouts.layout_principal')

@section('titulo','Viajes')

@section('contenido')

	<h1 class="text-center">Próximos Viajes</h1>
	<div class="row">
	@foreach($viajes as $viaje)
		<div class="col-sm">
			<div class="card " style="width: 18rem;">
			    <img class="card-img-top mx-auto d-block" style="width:100px;height:100px" src="img/portada/{{$viaje->portada}}" alt="imagen de la portada">	
			    <div class="card-body text-center">
			    	<h4 class="card-title">{{ $viaje->titulo }}</h4>
			    	<p class="card">{{ $viaje->descripcion }}</p>
			    	<p class="card">Fecha de Partida: {{ $viaje->fecha_partida }}</p>
			    	<p class="card">Fecha de Regreso: {{ $viaje->fecha_regreso }}</p>
			    	<a href="/viaje/{{$viaje->id}}" class="btn btn-primary">Ver Más...</a>
			    </div>
			</div>
		</div>
		
	@endforeach
	</div>
@endsection


