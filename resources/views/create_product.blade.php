<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
</head>
<body>
    @extends('layouts.app')

    @section('content')
    <div class='container'>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Detail') }}</div>
                    
                    <div class="card-body">
                        <form action="{{  route('store_product') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="from-group">
                                <label for="">Product Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Product Name">
                            </div>

                            <div class="form-group">
                                <label for="">Description</label>
                                <input type="text" name="description" class="form-control" placeholder="Description">
                            </div>

                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="number" name="price" class="form-control"  placeholder="Price">
                            </div>

                            <div class="form-group">
                                <label for="">Stock</label>
                                <input type="number" name="stock" class="form-control" placeholder="Stock">
                            </div>

                            <div class="form-group">
                                <label for="">Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Add Product</button>
                        </form>
                    </div>        
                </div>
            </div>
        </div>
    </div>
    @endsection
</body>
</html>