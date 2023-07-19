@extends('layouts.app')

@section('template_title')
    {{ $categoria->nombre ?? __('Show Categoria') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('DETALLES') }} Categoria</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('categorias.index') }}"> {{ __('REGRESAR') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Imagen</th>
                                        <th>Nombre</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categoria->productos as $producto)
                                        <tr>
                                            <td>{{ $producto->id }}</td>
                                            <td>
                                                <img src="{{ asset('storage/imagenes/'.$producto->imagen) }}" alt="Imagen del producto" width="50">
                                            </td>
                                            <td>{{ $producto->nombre }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

