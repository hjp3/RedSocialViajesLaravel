@extends('layouts.layout_principal')

@section('contenido')
	
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						Lista de Etiquetas
						<a href="{{ route('etiquetas.create') }}" class="btn btn-sm btn-primary pull-right">Crear</a>
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
	            			@foreach($etiquetas as $etiqueta)
	            			<tr>
	            				<td>{{ $etiqueta->id }}</td>
	            				<td>{{ $etiqueta->nombre }}</td>
	            				<td width="10px">
	            					<a href="{{ route('etiquetas.show', $etiqueta->id) }}" class="btn btn-sm btn-default">Ver</a>
	            				</td>
	            				<td width="10px">
	            					<a href="{{ route('etiquetas.edit', $etiqueta->id) }}" class="btn btn-sm btn-default">Editar</a>
	            				</td>
	            				<td width="10px">
	            					<form action="etiquetas/{{$etiqueta->id}}" method="post">
										{{ csrf_field() }}
										{{method_field('delete')}}
									<button type="submit" class="btn btn-danger">Borrar</button>
									</form>
	            				</td>
	            			</tr>
	            			@endforeach
	            		</tbody>
	            	</table>
	            	{{ $etiquetas->render() }}        
				</div>

			</div>
		</div>
	</div>

@endsection