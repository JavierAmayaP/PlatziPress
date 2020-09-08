@extends('layouts.app')

<!-- Notas:
Uso de la entidad html &nbsp; que agrega un espacio vacio 
Nota:
Rowspan, indica el número de filas que ocupará la celda. Por defecto ocupa una sola fila.
Colspan, indica el número de columnas que ocupará la celda. Por defecto ocupa una sola columna.
De esta forma si ponemos <td colsan=2>, quiere decir que la celda actual se extiende en el ancho de dos celdas.
Algo parecido ocurre si ponemos <td rowspan=3>, la celda ocupará el alto de 3 celdas normales.

Nota: <th> y <tr> y <td>

<tr> Siginica table row, etiqueta que me ayud aa creara filas dentro de mi tabla
<th> Siginica celda la cual me permite crear columnas dentro de mi fila(Mas usando en la etiqueta <thead>)
<td> siginifica celda la cual me permite crear columnas dentro de mi fila (mas usada en el etiqueta <tbody>)
 -->

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <i class="far fa-newspaper"></i> Artículos
                    <a href="{{ route('posts.create') }}" class="btn btn-sm btn-primary float-right"><i class="fas fa-plus-circle"></i></a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table class="table table-hover table-responsive">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Titulo</th>
                                <th colspan="2"> &nbsp; Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->title}}</td>
                                <td>
                                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary btn-sm"><i class="far fa-edit"></i></a>
                                </td>
                                <td>
                                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <!-- <input type="submit" value="Eliminar" class="btn btn-danger btn-small" )"> -->
                                        <button  type="submit" value="Eliminar" class="btn btn-danger btn-sm" onclick="return confirm('¿Desea Eliminar...?')">
                                        <i class="far fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection