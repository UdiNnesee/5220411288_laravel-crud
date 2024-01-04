@extends('products.layout')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Lihat Produk</h2>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary" href="{{ route('products.index') }}">Kembali</a>
        </div>
    </div>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Kode Barang</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Stok</th>
            <th scope="col">Harga</th>
            <th scope="col">Spesifikasi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">{{ $product->id }}</th>
            <td>{{ $product->Nama_Produk }}</td>
            <td>{{ $product->Stok }}</td>
            <td>Rp {{ $product->Harga }}</td>
            <td>{{ $product->Spesifikasi }}</td>
        </tr>
    </tbody>
</table>

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-success" href="{{ route('products.edit', $product->id) }}">Edit</a>
    </div>

@endsection
