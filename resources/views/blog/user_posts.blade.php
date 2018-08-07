@extends('layouts.layout_principal')

@section('contenido')
	<br>
	
	<br>
	<div class="container">
		<div class="col-md-8 col-md-offset-2">
			<h1>Últimos Posteos de {{ $autor->name }}</h1>
			{{-- {{dd($posteos)}} --}}
			@foreach($posteos as $post)
			<div class="panel panel-default">
				<div class="panel-heading">
					{{ $post->titulo }}
				</div>
				<div class="panel-body">
                    @if($post->imagen)    
 						<img src="{{ $post->imagen }}" class="img-responsive">
 					@endif
 					{{ $post->extracto }}
					<br>
					<td width="10px">
						<a href="{{ route('post',$post->id)}}" class="btn btn-sm btn-default">Leer Más</a>
					</td>
					@if (Auth::user()->email == $autor->email))
						<td width="10px">
							<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-default">Editar</a>
						</td>
						<td width="10px">
							<form action="posts/{{$post->id}}" method="post">
								{{ csrf_field() }}
								{{method_field('delete')}}
							<button type="submit" class="btn btn-danger">Borrar</button>
							</form>
						</td>
					@endif
					
					
				</div>
			</div>
			<br>
			@endforeach
			{{ $posteos->render() }}
		</div>
	</div>

@endsection