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
	            	
	            	<form action="{{ route('etiquetas.update', $etiqueta->id) }}" class="form-group" method="POST" enctype="multipart/form-data">
						@csrf
						{{method_field('PATCH')}}
						<div class="form-group">
							<label for="nombre">Nombre</label>
							<input type="text" class="form-control" name="nombre" value="{{ $etiqueta->nombre }}">
							<label for="slug">Nombre</label>
							<input type="text" class="form-control" name="slug" value="{{ $etiqueta->slug }}">
							<button type="submit" class="btn btn-primary">Crear Etiqueta</button>
						</div>

							
					</form>        
				</div>

			</div>
		</div>
	</div>
	hola

@endsection