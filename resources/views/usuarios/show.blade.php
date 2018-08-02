@extends('layouts.layout_principal')


@section('contenido')
	<div class="text-center">
		<h1 class="title">{{ $user->name }}</h1>
		<br>
		<img class=" mx-auto d-block" style="width:300px;height:300px" src="{{$user->avatar}}" alt="imagen de la portada">
		<br>	
	    <h3 class="">{{ $user->usuario }}</h3>
    	<br>
    	<br>
    	<a href="/users" class="btn btn-primary">Volver</a>
    	<a href="/users/{{ $user->id }}/edit" class="btn btn-primary">Editar</a>
		@if (Auth::user()->email == "admin@admin.com")
			<form action="/users/{{ $user->id }}" method="post">
				{{ csrf_field() }}
				{{method_field('delete')}}
				<button type="submit" class="btn btn-danger">Borrar</button>
			</form>
		@endif	
	</div>		    	
			    
	
@endsection


