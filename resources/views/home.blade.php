@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Bienvenido {{ Auth::user()->name }} </h1>
                    <img src="{{ Auth::user()->avatar }}" alt="" style="width: 100px">
                    <br>
                    <a href="/users/{{ Auth::user()->id }}/edit" class="btn btn-primary">Editar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
