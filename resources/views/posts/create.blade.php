@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">
                    <a href="{{route('posts.index')}}" class="btn btn-outline-primary btn-sm"><i class="far fa-hand-point-left"></i></a> Crear Artículo
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Título*</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="image">Imagen</label>
                            <input type="file" name="file" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="Contenido">Contenido *</label>
                            <textarea name="body" rows="6" class="form-control" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="iframe">Contenido enbebido</label>
                            <textarea name="iframe" class="form-control"></textarea>
                        </div>
                        
                        <div class="form-group">
                            @csrf
                            <input type="submit" value="Enviar" class="btn btn-sm btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection