@extends('layouts.layout')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar producto: {{ $product->name }}</h1>

    <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $product->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="product_type" class="form-label">Tipo de producto</label>
            <select class="form-select" id="product_type" name="product_type" required>
                <option value="tipo1" {{ $product->product_type == 'tipo1' ? 'selected' : '' }}>Tipo 1</option>
                <option value="tipo2" {{ $product->product_type == 'tipo2' ? 'selected' : '' }}>Tipo
                    <option value="tipo3" {{ $product->product_type == 'tipo3' ? 'selected' : '' }}>Tipo 3</option>
                </select>
            </div>

            <div class="form-group">
                <label for="price">Precio</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
            </div>
            
            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="number" class="form-control" id="stock" name="stock" value="{{ $product->stock }}" required>
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">Ubicación</label>
                <input type="text" class="form-control" id="location" name="location" value="{{ $product->location }}">
            </div>
    
            <div class="mb-3">
                <label for="expiration_date" class="form-label">Fecha de vencimiento</label>
                <input type="date" class="form-control" id="expiration_date" name="expiration_date" value="{{ $product->expiration_date }}">
            </div>
    
            <div class="mb-3">
                <label for="image" class="form-label">Imagen del producto (opcional)</label>
                <input type="file" class="form-control" id="image" name="image">
                <p>Imagen actual:</p>
                <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" width="100" height="100">
            </div>
    
            <button type="submit" class="btn btn-primary">Actualizar producto</button>
        </form>
    </div>
    @endsection
    