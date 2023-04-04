@extends('layouts.layout')

@section('content')
<div class="container">
    <h1 class="mb-4">Resultados de búsqueda</h1>
    @if(count($products) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Tipo</th>
                    <th>Precio</th>
                    <th>Stock</th>
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
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->location }}</td>
                        <td>{{ $product->expiration_date }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" width="50" height="50">
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
    @else
        <p>No se encontraron resultados para la búsqueda "{{ $search }}"</p>
    @endif
</div>
@endsection
