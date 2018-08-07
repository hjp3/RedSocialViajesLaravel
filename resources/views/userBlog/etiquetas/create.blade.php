@extends('layouts.layout_principal')

@section('contenido')
	
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						Crear Etiqueta
					</div>
					
				</div>

				<div class="panel-body">
	            	
	            	<form action="{{ route('etiquetas.store') }}" class="form-group" method="POST" >
						@csrf
						 
						<div class="form-group">
							<label for="nombre">Nombre</label>
							<input type="text" class="form-control" name="nombre">
							
							<button type="submit" class="btn btn-primary">Crear Etiqueta</button>
						</div>

							
					</form>
					<a href="{{route('etiquetas.index')}}" class="btn"><h3>Volver</h3></a>        
				</div>

			</div>
		</div>
	</div>

@endsection