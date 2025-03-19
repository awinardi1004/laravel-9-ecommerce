<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit {{ $product->name }}</title>
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
                        <form action="{{ route('update_product', $product) }}" method="post" enctype="multipart/form-data">
                            @method('patch')
                            @csrf
                            <div class="form-group">
                                <label for="">Product Name</label>
                                <input type="text" name="name" placehoder="Product Name" class="form-control" value="{{ $product->name }}" >
                            </div>
                            
                            <div class="form-group">
                                <label for="">Description</label>
                                <input type="text" name="description" placehoder="description" class="form-control" value="{{ $product->description }}">
                            </div>

                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="number" name="price" placehoder="price" class="form-control"  value="{{ $product->price }}">
                            </div>

                            <div class="form-group">
                                <label for="">Stock</label>
                                <input type="number" name="stock"  placehoder="stock" class="form-control" value="{{ $product->stock }}">
                            </div>

                            <div class="form-group">
                                <label for="">Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Update Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
</body>
</html>