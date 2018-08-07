@extends('layouts.layout_principal')

@section('titulo','Viajes')

@section('contenido')

	<h1 class="text-center">Todos los Viajeros</h1>
	<div class="row">
	@foreach($users as $user)
		<div class="col-sm">
			<div class=" " style="width: 18rem;">
			    <img class="img-top mx-auto d-block" style="width:100px;height:100px" src="{{$user->avatar}}" alt="imagen de la portada">	
			    <div class=" text-center">
			    	<p class="title">Nombre: {{ $user->name }}</p>
			    	<p ({{ $user->usuario }})</p>
			    	<a href="/users/{{$user->id}}" class="btn btn-primary">Ver Más...</a>
			    	@if (Auth::user()->email == "admin@admin.com")
				    	<form action="/users/{{ $user->id }}" method="post">
							{{ csrf_field() }}
							{{method_field('delete')}}
							<button type="submit" class="btn btn-danger">Borrar</button>
						</form>
					@endif	
			    <br><br>
			    </div>
			    
			</div>
		</div>
		
	@endforeach
	</div>
	<br>
	{!! $users->links() !!}
	
@endsection


