@extends('layouts.layout_principal')

@section('contenido')
	
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						Lista de Mensajes
					</div>
					
				</div>

				<div class="panel-body">
	            	<table class="table table-striped table-hoved">
	            		<thead>
	            			<tr>
	            				<th width="10px">ID</th>
	            				<th>ID_USUARIO:</th>
	            				<th colspan="3">&nbsp;</th>
	            			</tr>
	            		</thead>
	            		<tbody>
	            			@foreach($contactos as $contacto)
	            			<tr>
	            				<td>{{ $contacto->id }}</td>
                                <td><a href="/users/{{ $contacto->user_id }}">{{ $contacto->user_id }}</a></td>
	            				<td width="10px">
	            					<a href="{{ route('contactos.show', $contacto->id) }}" class="btn btn-default">Ver Más</a>
	            				</td>
	            				<td width="10px">
	            					<form action="contactos/{{ $contacto->id }}" method="post">
										{{ csrf_field() }}
										{{method_field('delete')}}
									<button type="submit" class="btn btn-danger">Borrar</button>
									</form>
	            				</td>
	            			</tr>
	            			@endforeach
	            		</tbody>
	            	</table>
	            	{{ $contactos->render() }}        
				</div>

			</div>
		</div>
	</div>

@endsection