@extends('layouts.layout_principal')

@section('contenido')

	<h1 class="text-center">Próximos Viajes</h1>
	<div class="row">
	{{-- {{dd(Auth::user()->email)}} --}}
	@foreach($viajes as $viaje)
		<div class="col-sm">
			<div class="" style="width: 18rem;">
			    <img class="card-img-top mx-auto d-block" style="width:100px;height:100px" src="{{$viaje->portada}}" alt="imagen de la portada">	
			    <div class="">
			    	<h4 class="card-title">{{ $viaje->titulo }}</h4>
			    	{{-- <p class="">{{ $viaje->descripcion }}</p> --}}
			    	<p class="">Fecha de Partida: {{ $viaje->fecha_partida }}</p>
			    	<p class="">Fecha de Regreso: {{ $viaje->fecha_regreso }}</p>
			    	@if (Auth::user()->email == "admin@admin.com")
			    		<form action="/viaje/{{ $viaje->id }}" method="post">
							{{ csrf_field() }}
							{{method_field('delete')}}
							<button type="submit" class="btn btn-danger">Borrar</button>
						</form>
						<a href="/viaje/{{$viaje->id}}" class="btn btn-primary">Editar</a>	
					@endif
			    	@if( Auth::user())
			    		<a href="/viaje/{{$viaje->id}}" class="btn btn-primary">Ver Más...</a>
			    	@endif

			    		
			    </div>
			</div>
		</div>
		
	@endforeach
	</div>
@endsection


