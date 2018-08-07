@extends('layouts.layout_principal')

@section('contenido')
	<br>
	{{-- @if (Auth::user())
		<ul class="nav navbar-nav navbar-right">
			<li><a href="{{ route('etiquetas.index') }}">Etiquetas</a></li>
            <li><a href="{{ route('categorias.index') }}">Categorías</a></li>
            <li><a href="{{ route('posts.index') }}">Entradas</a></li>
		</ul>
	@endif --}}
	<br>
	<div class="container">
		<div class="col-md-8 col-md-offset-2">
			<h1>Últimos Posteos</h1>
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
					<a href="{{ route('post',$post->id)}}" class="pull-right">Leer Más</a>
					
					@foreach ($usuarios as $usuario)
						<div
						    @if($usuario->id == $post->user_id)
						       <p> posteado por <a href="/users/{{$usuario->id}}">{{ $usuario->name }}</a></p>	
						    @endif
						</div>
					@endforeach
				</div>
			</div>
			<br>
			@endforeach
			{{ $posteos->render() }}
		</div>
	</div>

@endsection