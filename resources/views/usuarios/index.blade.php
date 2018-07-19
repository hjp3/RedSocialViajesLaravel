@extends('layouts.layout_viaje')

@section('titulo','Viajes')

@section('contenido')

	<h1 class="text-center">Próximos Viajes</h1>
	<div class="row">
	@foreach($users as $user)
		<div class="col-sm">
			<div class="card " style="width: 18rem;">
			    <img class="card-img-top mx-auto d-block" style="width:100px;height:100px" src="{{$user->avatar}}" alt="imagen de la portada">	
			    <div class="card-body text-center">
			    	<h4 class="card-title">{{ $user->name }}</h4>
			    	<p class="card">{{ $user->usuario }}</p>
			    	<p class="card">{{ $user->email }}</p>
			    	<a href="/users/{{$user->id}}" class="btn btn-primary">Ver Más...</a>
			    	<form action="/users/{{ $user->id }}" method="post">
						{{ csrf_field() }}
						{{method_field('delete')}}
						<button type="submit" class="btn btn-danger">Borrar</button>
					</form>
			    </div>
			</div>
		</div>
		
	@endforeach
	</div>
@endsection


