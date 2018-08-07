@extends('layouts.layout_principal')

@section('contenido')
	
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						Ver Post
					</div>
					
				</div>

				<div class="panel-body">
					<p><strong>Título:&nbsp;</strong>{{ $post->titulo }}</p>
	            	<p><strong>Slug:&nbsp;</strong>{{ $post->slug }}</p>
	            	<p><strong>Extracto:&nbsp;</strong></p>
	            	<p>{{ $post->extracto }}</p>
	            	<p><strong>Cuerpo:&nbsp;</strong></p>
	            	<p>{{ $post->cuerpo }}</p>
	            	<p><strong>Estado:&nbsp;</strong>{{ $post->status }}</p>
	            	<p>Imagen:<img src="{{ $post->imagen }}"></p>
	            	<a href="{{ url('/blogUsuario',['id'=> $autor->id]) }}" class="btn"><h3>Volver</h3></a>
        	</div>

			</div>
		</div>
	</div>

@endsection