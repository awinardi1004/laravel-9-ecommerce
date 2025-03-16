<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }}</title>
</head>
<body>
    <a href="{{ route('index_product') }}">Back to Index Product</a><br>
    <img src="{{ url('storage/'. $product->image) }}" alt="" height="100px">
    <P>name: {{ $product->name }}</P>
    <p>Price: Rp.{{ $product->price }}</p>
    <p>stock: {{ $product->stock }}</p>
    <p>Description: {{ $product->description }}</p>
    <form action="{{ route('edit_product', $product) }}" method="get">
        <button type="submit">Edit Product</button>
    </form>
    <form action="{{ route('add_to_cart', $product) }}" method="post">
        @csrf
        <input type="number" name="amount" value=1>
        <button type="submit">Add to </button>
    </form>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif 
</body>
</html>