@extends('layouts.layout_principal')

@section('contenido')
	
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						Comunicate con nosotros: escribimos tus comentarios, quejas, dudas, etc...
					</div>
					
				</div>

				<div class="panel-body">
	            	
	            	<form action="{{ route('contactos.store') }}" class="form-group" method="POST" >
						@csrf
						 
						<div class="form-group">
							<input type="hidden" class="form-control" name="user_id" value="@guest {{ 1 }} @else {{Auth::user()->id}} @endguest" >
							<label for="nombre">Tu Mensaje:</label>
							<textarea name="texto" class="form-control" rows="10" cols="50"></textarea>
							
							<button type="submit" class="btn btn-primary">Enviar Mensaje</button>
						</div>

							
					</form> 
					<a href="/" class="btn"><h3>Volver</h3></a>       
				</div>

			</div>
		</div>
	</div>

@endsection