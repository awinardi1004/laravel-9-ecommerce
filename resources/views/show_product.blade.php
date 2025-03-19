<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }}</title>
</head>
<body>
@extends('layouts.app')

@section('content')
<div class='container'>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Products Detail') }}</div>

                <div class="card-body">
                    <div class="d-flex"> <!-- Gunakan flexbox untuk layout -->
                        <!-- Kolom Gambar -->
                        <div class="flex-shrink-0" style="width: 200px;"> <!-- Atur lebar tetap untuk gambar -->
                            <img src="{{ url('storage/'. $product->image) }}" alt="" class="img-fluid" style="width: 100%; height: auto; object-fit: cover;"> <!-- Gambar diatur agar responsif -->
                        </div>

                        <!-- Kolom Deskripsi -->
                        <div class="flex-grow-1 ms-3"> <!-- Kolom deskripsi akan mengambil sisa ruang -->
                            <h1>{{ $product->name }}</h1>
                            <div style="max-height: 150px; overflow-y: auto;"> <!-- Atur tinggi maksimal dan scroll jika deskripsi panjang -->
                                <h6>{{ $product->description }}</h6>
                            </div>
                            <h3>Rp.{{ $product->price }}</h3>
                            <hr>
                            <p>{{ $product->stock }} left</p>
                            <form action="{{ route('add_to_cart', $product) }}" method="post">
                                @csrf
                                <div class="input-group mb-3"> <!-- Perbaiki typo "md-3" menjadi "mb-3" -->
                                    <input type="number" class="form-control" aria-describedby="basic-addon2" name="amount" value=1>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-outline-secondary">Add to cart</button>
                                    </div>
                                </div>
                            </form>
                            <form action="{{ route('edit_product', $product) }}" method="get">
                                <button type="submit" class="btn btn-primary">Edit Product</button>
                            </form>
                        </div>
                    </div>

                    <!-- Menampilkan pesan error -->
                    @if($errors->any())
                        <div class="mt-3">
                            @foreach($errors->all() as $error)
                                <p class="text-danger">{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
</body>
</html>