@extends('layouts.layout_principal')

@section('contenido')
	<div class="container">
		<div class="col-md-8 col-md-offset-2">
			<h1>Posteos Según la Categoría {{ session('categoria') }}</h1>
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
					
					<a href="{{ route('post',$post->id)}}" class="pull-right">Leer Más</a>
				</div>
			</div>
			<br>
			@endforeach
			{{ $posteos->render() }}
		</div>
	</div>

@endsection