@extends('layouts.layout_principal')

@section('contenido')
	<div class="container">
		<div class="col-md-8 col-md-offset-2">
			<h1>{{ $post->titulo }}</h1>
			
			<div class="panel panel-default">
				<div class="panel-heading">
					Categoría:
					{{-- usamos el método categoría de Post para seleccionar el nombre de la misma--}}
					<a href="{{ route('categoria',$post->categoria->slug) }}">{{ $post->categoria->nombre }}</a>
				</div>
				<div class="panel-body">
                    @if($post->imagen)    
 						<img src="{{ $post->imagen }}" class="img-responsive">
 					@endif
 					{{ $post->extracto }}
 					<hr>
 					{{-- el cuerpo va en formato html: puede llevar negrita,cursiva, etc --}}
 					{!! $post->cuerpo !!}
 					<hr>
 					Etiquetas:
 					{{-- recorremos las etiquetas del post que las encontramos con el método tags--}}
 					<div>
 					    @foreach($post->etiquetas as $etiqueta)
 						    <a href="{{ route('etiqueta', $etiqueta->slug) }}">{{$etiqueta->nombre}}</a>
 						@endforeach
 					</div>
				</div>
			</div>
			<br>
			{{-- <a href="{{ route('posts')}}" class="pull-right">Volver</a> --}}
		</div>
	</div>

@endsection