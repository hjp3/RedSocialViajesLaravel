@extends('layouts.layout_principal')

@section('contenido')
	
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						Lista de Categorías
						<a href="{{ route('posts.create') }}" class="btn btn-sm btn-primary pull-right">Crear</a>
					</div>
					
				</div>

				<div class="panel-body">
	            	<table class="table table-striped table-hoved">
	            		<thead>
	            			<tr>
	            				<th width="10px">ID</th>
	            				<th>Nombre:</th>
	            				<th colspan="3">&nbsp;</th>
	            			</tr>
	            		</thead>
	            		<tbody>
	            			@foreach($posts as $post)
	            			<tr>
	            				<td>{{ $post->id }}</td>
	            				<td>{{ $post->nombre }}</td>
	            				<td width="10px">
	            					<a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-default">Ver</a>
	            				</td>
	            				<td width="10px">
	            					<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-default">Editar</a>
	            				</td>
	            				<td width="10px">
	            					<form action="posts/{{$post->id}}" method="post">
										{{ csrf_field() }}
										{{method_field('delete')}}
									<button type="submit" class="btn btn-danger">Borrar</button>
									</form>
	            				</td>
	            			</tr>
	            			@endforeach
	            		</tbody>
	            	</table>
	            	{{ $posts->render() }}        
				</div>

			</div>
		</div>
	</div>

@endsection