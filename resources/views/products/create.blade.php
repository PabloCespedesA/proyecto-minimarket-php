@extends('layouts.layout')

@section('content')
<div class="container">
    <h1 class="mb-4">Agregar producto</h1>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="product_type" class="form-label">Tipo de producto</label>
            <select class="form-select" id="product_type" name="product_type" required>
                <option value="tipo1">Aseo</option>
                <option value="tipo2">Comida</option>
                <option value="tipo3">Dulces</option>
                <option value="tipo4">Fiambrería</option>
                <option value="tipo5">Galletas</option>
                <option value="tipo6">Utiles</option>
                <option value="tipo7">Verdura</option>
                <option value="tipo8">Otros</option>
            </select>

        </div>
        
        <div class="form-group">
            <label for="price">Precio</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" required>
        </div>
        
        <div class="mb-3">
             <label for="stock" class="form-label">Stock</label>
             <input type="number" class="form-control" id="stock" name="stock" required>
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Ubicación</label>
            <input type="text" class="form-control" id="location" name="location" required>
       </div>  

        <div class="mb-3">
            <label for="expiration_date" class="form-label">Fecha de vencimiento</label>
            <input type="date" class="form-control" id="expiration_date" name="expiration_date">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Imagen</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>

        <button type="submit" class="btn btn-primary">Agregar producto</button>
    </form>
</div>
@endsection

