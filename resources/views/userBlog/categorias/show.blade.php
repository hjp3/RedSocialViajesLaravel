@extends('layouts.layout_principal')

@section('contenido')
	
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						Ver Categoría
					</div>
					
				</div>

				<div class="panel-body">
	            	<p><strong>Nombre:&nbsp;</strong>{{ $categoria->nombre }}</p>
	            	<p><strong>Slug:&nbsp;</strong>{{ $categoria->slug }}</p>
	            	<p>{{ $categoria->cuerpo }}</p>
	            		
	            </div>
	            <a href="{{route('categorias.index')}}" class="btn"><h3>Volver</h3></a>

			</div>
		</div>
	</div>

@endsection