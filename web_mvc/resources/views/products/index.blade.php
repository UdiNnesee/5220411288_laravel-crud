@extends('products.layout')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="d-grid gap-2 d-md-block">
            <h2>Daftar Barang</h2>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success" href="{{ route('products.create') }}">Tambah Barang</a>
        </div>
    </div>
</div>

@if ($message=  Session::get('Berhasil'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col text-center">Kode Barang</th>
        <th scope="col text-center">Nama Barang</th>
        <th scope="col text-center" width="280px">Pilihan</th>
      </tr>
    </thead>
    @foreach ($products as $product)
    <tbody>
      <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->Nama_Produk }}</td>
        {{-- <td>{{ $product->Stok }}</td> --}}
        {{-- <td>{{ $product->Harga }}</td>
        <td>{{ $product->Spesifikasi }}</td> --}}
        <td>
          <form action="{{ route('products.destroy', $product->id) }}" method="POST">
            <a class="btn btn-info" href="{{ route('products.show', $product->id) }}">Lihat</a>
            <a class="btn btn-primary" href="{{ route('products.edit', $product->id) }}">Edit</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>        
        </td>
    @endforeach
      </tr>
    </tbody>
  </table>
{{ $products->links() }}

@endsection