@extends('layouts.layout_principal')

@section('contenido')
	
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						Lista de Posts
						
					</div>
					
				</div>

				<div class="panel-body">
	            	<table class="table table-striped table-hoved">
	            		<thead>
	            			<tr>
	            				<th width="10px">ID</th>
	            				<th>Título:</th>
	            				<th>Estado:</th>
	            				<th colspan="3">&nbsp;</th>
	            			</tr>
	            		</thead>
	            		<tbody>
	            			@foreach($posts as $post)
	            			<tr>
	            				<td>{{ $post->id }}</td>
	            				<td>{{ $post->titulo }}</td>
	            				<td>{{ $post->status }}</td>
	            				<td width="10px">
	            					<a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-default">Ver</a>
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