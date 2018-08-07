@extends('layouts.layout_principal')

@section('contenido')
	
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						Ver Etiqueta
					</div>
					
				</div>

				<div class="panel-body">
	            	<p><strong>Nombre:&nbsp;</strong>{{ $etiqueta->nombre }}</p>
	            	<p><strong>Slug:&nbsp;</strong>{{ $etiqueta->slug }}</p>
	            		
	            </div>
	            <a href="{{route('etiquetas.index')}}" class="btn"><h3>Volver</h3></a>

			</div>
		</div>
	</div>

@endsection