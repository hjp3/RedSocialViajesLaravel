@extends('layouts.layout_principal')

@section('contenido')
	
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						Crear Categoría
					</div>
					
				</div>

				<div class="panel-body">
	            	
	            	<form action="{{ route('categorias.store') }}" class="form-group" method="POST" >
						@csrf
						 
						<div class="form-group">
							<label for="nombre">Nombre</label>
							<input type="text" class="form-control" name="nombre">
							<label for="nombre">Cuerpo</label>
							<textarea name="cuerpo" class="form-control"></textarea>
							
							<button type="submit" class="btn btn-primary">Crear Categoría</button>
						</div>

							
					</form> 
					<a href="{{route('categorias.index')}}" class="btn"><h3>Volver</h3></a>       
				</div>

			</div>
		</div>
	</div>

@endsection