@extends('layouts.layout_principal')

@section('contenido')
	
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						Crear Post
					</div>
					
				</div>

				<div class="panel-body">
	            	
	            	<form action="{{ route('posts.store') }}" class="form-group" method="POST" enctype="multipart/form-data" >
						@csrf
						 
						<div class="form-group">
							<label for="titulo">Titulo</label>
							<input type="text" class="form-control" name="titulo">
							<label for="extracto">Resumen</label>
							<textarea name="extracto" class="form-control"></textarea>
							<label for="cuerpo">Cuerpo</label>
							<textarea name="cuerpo" class="form-control"></textarea>
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