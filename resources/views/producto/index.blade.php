@extends('layouts.app')

@section('template_title')
    Producto
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div class="col">
                                <span id="card_title">
                                    {{ __('Producto') }}
                                </span>
                            </div>
                            <div class=" text-right">
                                <a href="{{ route('productos.create') }}" class="btn btn-primary btn-sm" data-placement="left">
                                    {{ __('CREAR UN NUEVO POSTRE') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="row productos-container">
                        @foreach ($productos as $producto)
                            <div class="col-md-3">
                                <div class="card" style="width: 17rem;">
                                    <img src="{{ asset('storage/imagenes/'.$producto->imagen) }}" class="card-img-top" alt="Imagen del producto">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $producto->nombre }}</h5>
                                        <p class="card-text">{{ $producto->descripcion }}</p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Categoria: {{ $producto->categoria->nombre }}</li>
                                        <li class="list-group-item">precio: ${{ $producto->precio }}</li>
                                        <li class="list-group-item">stock: {{ $producto->stock }}</li>
                                    </ul>
                                    <div class="card-body">
                                        <form action="{{ route('productos.destroy',$producto->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary" href="{{ route('productos.show',$producto->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('DETALLES') }}</a>
                                            <a class="btn btn-sm btn-success" href="{{ route('productos.edit',$producto->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('EDITAR') }}</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('ELIMINAR') }}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                {!! $productos->links() !!}
            </div>
        </div>
    </div>
@endsection







