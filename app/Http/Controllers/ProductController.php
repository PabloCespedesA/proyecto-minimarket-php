<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }
    
    public function create()
    {
        return view('products.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'expiration_date' => 'required|date',
            'product_type' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $imagePath = $request->file('image')->store('images', 'public');
    
        $product = new Product([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
            'location' => $request->input('location', null), // Agregamos el valor por defecto
            'expiration_date' => $request->input('expiration_date'),
            'product_type' => $request->input('product_type'),
            'image_path' => $imagePath, 
        ]);
    
        $product->save();
    
        return redirect()->route('products.index')->with('success', 'Producto creado exitosamente.');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'expiration_date' => 'required|date',
        ]);

        $product = Product::findOrFail($id);

        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->location = $request->input('location', null); // Agregamos el valor por defecto
        $product->expiration_date = $request->input('expiration_date');

        $product->save();

        return redirect()->route('products.index')->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        Storage::delete($product->image_path); // eliminar la imagen almacenada
        $product->delete();
    
        return redirect()->route('products.index')->with('success', 'Producto eliminado exitosamente.');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $products = Product::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('location', 'LIKE', "%{$search}%")
            ->get();

        return view('products.index', compact('products'));
    }
}
