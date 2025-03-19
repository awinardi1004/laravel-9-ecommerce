<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Product</title>
</head>
<body>
@extends('layouts.app')

@section('content')
<div class='container'>
    <div class="row justify-content-center">
        <div class="col-md-12"> <!-- Ubah col-md-8 menjadi col-md-12 untuk memanfaatkan lebar penuh -->
            <div class="card">
                <div class="card-header">{{ __('Products') }}</div>

                <div class="card-body">
                    <div class="row"> <!-- Gunakan row untuk membuat grid -->
                        @foreach ($products as $product)
                            <div class="col-md-3 mb-4"> <!-- Setiap produk menempati 3 kolom (4 produk per baris) -->
                                <div class="card h-100"> <!-- Gunakan h-100 untuk membuat tinggi card seragam -->
                                    <img class="card-img-top" src="{{ url('storage/'. $product->image) }}" alt="Card image cap" style="height: 200px; object-fit: cover;"> <!-- Atur tinggi gambar dan object-fit -->
                                    <div class="card-body">
                                        <p class="card-text">Name: {{ $product->name }}</p>
                                        <p class="card-text">RP. {{ $product->price }}</p>
                                        <form action="{{ route('show_product', $product) }}" method="get">
                                            <button type="submit" class="btn btn-primary">Show Detail</button>
                                        </form>
                                        <form action="{{ route('delete_product', $product) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger mt-2">Delete Product</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
</body>
</html>