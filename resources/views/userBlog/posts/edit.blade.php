@extends('layouts.layout_principal')

@section('contenido')
	
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						Editar Etiqueta
					</div>
					
				</div>

				<div class="panel-body">
	            	
	            	<form action="{{ route('posts.update', $post->id) }}" class="form-group" method="POST" enctype="multipart/form-data">
						@csrf
						{{method_field('PATCH')}}
						<div class="form-group">
							<label for="nombre">Nombre</label>
							<input type="text" class="form-control" name="nombre" value="{{ $post->nombre }}">
							<label for="extracto">Resumen</label>
							<textarea name="extracto" class="form-control">{{ $post->extracto }}</textarea>
							<label for="cuerpo">Cuerpo</label>
							<textarea name="cuerpo" class="form-control">{{ $post->cuerpo }}</textarea>
							<label for="status">Estado</label>
							<input type="radio" name="status" value="BORRADOR">borrador<br>
  							<input type="radio" name="status" value="PUBLICADO">publicado<br>
							<input type="file" class="form-control" name="imagen">
							<button type="submit" class="btn btn-primary">Crear Post</button>
						</div>

							
					</form>        
				</div>

			</div>
		</div>
	</div>

@endsection