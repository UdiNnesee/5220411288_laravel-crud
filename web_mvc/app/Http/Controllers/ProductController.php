<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = products::latest()->paginate(3);

        return view('products.index', compact('products'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'Nama_Produk' => 'required',
            'Stok' => 'required',
            'Harga' => 'required',
            'Spesifikasi' => 'required'
        ]);

        products::create($request->all());

        return redirect()->route('products.index')->with('Berhasil', 'Barang berhasil di-input');
    }

    /**
     * Display the specified resource.
     */
    public function show(products $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(products $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, products $products)
    {
        $request->validate([
            'id' => 'required',
            'Nama_Produk' => 'required',
            'Stok' => 'required',
            'Harga' => 'required',
            'Spesifikasi' => 'required'
        ]);

        $products->update($request->all());

        return redirect()->route('products.index')->with('Berhasil', 'Barang berhasil di-Edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(products $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('Berhasil', 'Barang berhasil di-Hapus');
    }
}
