@extends('layouts.layout_principal')

@section('contenido')
	<div class="container">
		<div class="col-md-8 col-md-offset-2">
			<h1>Posteos según la categoría "{{ $categoria->nombre }}"</h1>
			
			@foreach($posteos as $post)
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>{{ $post->titulo }}</h2>
				</div>
				<div class="panel-body">
                    @if($post->imagen)    
 						<img src="{{ $post->imagen }}" class="img-responsive">
 					@endif
 					{{ $post->extracto }}
					<br>
					<a href="{{ route('post',$post->id)}}" class="pull-right">Leer Más</a>
					@foreach ($users as $user)
					    @if ($user->id == $post->user_id)
							<p>Posteado por <a href="/users/{{$user->id}}">{{$user->name}}</a></p>	    
						@endif
					@endforeach
					
				</div>
			</div>
			<br>
			@endforeach
			{{ $posteos->render() }}
		</div>
	</div>

@endsection