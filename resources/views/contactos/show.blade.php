@extends('layouts.layout_principal')

@section('contenido')
	
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						Ver Contacto
					</div>
					
				</div>

				<div class="panel-body">
	            	<p><strong>Id</strong>{{ $contacto->id }}</p>
	            	<p><strong>Id Usuario: </strong><a href="/users/{{ $contacto->user_id }}">{{ $contacto->user_id }}</a></p>
	            	<p>{{ $contacto->texto }}</p>
	            		
	            </div>
	            <a href="{{route('contactos.index')}}" class="btn btn-success"><h3>Volver</h3></a>
				<a href="#" class="btn btn-warning"><h3>Responder</h3></a>
			</div>
		</div>
	</div>

@endsection