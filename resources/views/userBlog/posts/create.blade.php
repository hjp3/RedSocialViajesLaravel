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
							{{-- le pasamos el id del usuario que está logueado, para relacionar post con user--}} 
							{{-- {{dd(Auth::id())}} --}}
							<input type="hidden" name="user_id" value="{{ Auth::id() }}">
							<label>Elegí la categoría</label>
							{{-- {{dd($categorias)}} --}}
							<select name="categoria_id">
							 @foreach($categorias as $categoriaid => $categorianombre)
							     <option value="{{$categoriaid}}">{{$categorianombre}}</option>
							 @endforeach
							 </select>
							 <label form="etiqueta_array">Elegí las etiquetas</label>
							 <br>
							 @foreach($etiquetas as $etiqueta)
							 	<input type='checkbox' name='etiqueta_array[]' value='{{$etiqueta->id}}' />{{$etiqueta->nombre}}
							 @endforeach
							<label for="titulo">Titulo</label>
							<input type="text" class="form-control" name="titulo">
							<label for="extracto">Resumen</label>
							<textarea name="extracto" class="form-control"></textarea>
							<label for="cuerpo">Cuerpo</label>
							<textarea name="cuerpo" class="form-control"></textarea>
							<label for="status">Estado</label><br>
							<input type="radio" name="status" value="BORRADOR">borrador<br>
  							<input type="radio" name="status" value="PUBLICADO" checked>publicado<br>
							<input type="file" class="form-control" name="imagen">
       
							<button type="submit" class="btn btn-primary">Crear Post</button>
						</div>
						<a href="{{route('home')}}" class="btn"><h3>Volver</h3></a>

							
					</form>        
				</div>

			</div>
		</div>
	</div>

@endsection