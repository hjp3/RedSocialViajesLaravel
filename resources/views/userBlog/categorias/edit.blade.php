@extends('layouts.layout_principal')

@section('contenido')
	
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						Editar Categoría
					</div>
					
				</div>

				<div class="panel-body">
	            	
	            	<form action="{{ route('categorias.update', $categoria->id) }}" class="form-group" method="POST" enctype="multipart/form-data">
						@csrf
						{{method_field('PATCH')}}
						<div class="form-group">
							<label for="nombre">Nombre</label>
							<input type="text" class="form-control" name="nombre" value="{{ $categoria->nombre }}">
							<textarea name="cuerpo" class="form-control">{{ $categoria->cuerpo }}</textarea>
							{{-- <label for="slug">Nombre</label>
							<input type="text" class="form-control" name="slug" value="{{ $categoria->slug }}"> --}}
							<button type="submit" class="btn btn-primary">Editar Categoría</button>
						</div>

							
					</form>  
					<a href="{{route('categorias.index')}}" class="btn"><h3>Volver</h3></a>      
				</div>

			</div>
		</div>
	</div>

@endsection