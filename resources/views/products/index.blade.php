@extends('layouts.layout')

@section('content')
<div class="container-responsive">
    <h1 class="mb-4">Lista de productos</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-4">Agregar producto</a>
    <div  class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 5%">ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Tipo</th>
                    <th>Precio</th>
                    <th>Precio de venta</th>
                    <th >Stock</th>
                    <th>Ubicación</th>
                    <th>Fecha de vencimiento</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->product_type }}</td>
                        <td>{{ $product->price }}</td>
                        <td class="precio-venta">${{ number_format(ceil($product->price*1.3/10)*10, 0) }}
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->location }}</td>
                        <td>{{ $product->expiration_date}}</td>
                        <td>
                            <img src="{{ asset('storage/'.$product->image_path) }}" alt="{{ $product->name }}" width="50" height="50">


                        </td>
                        <td>
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
