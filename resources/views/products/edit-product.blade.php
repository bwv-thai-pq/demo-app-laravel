<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
        <title>Document</title>
    </head>
<body>
<body>

<div class="container w-25">
    <h2>Edit Product</h2>

    <form novalidate action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('put')
        <label for="name">Product name:</label><br>
        <input type="text" id="name" name="name"
            class="form-control @error('name') is-invalid @enderror" value="{{ $product->name }}">
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
        <label for="price">Price:</label><br>
        <input type="number" id="price" name="price"
            class="form-control @error('price') is-invalid @enderror" value="{{ $product->price }}">
        @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
        <label for="quantity">Quantity:</label><br>
        <input type="number" id="quantity" name="quantity"
            class="form-control @error('quantity') is-invalid @enderror" value="{{ $product->qty }}">
        @error('quantity')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br><br>
        <input type="submit" value="Submit">
        <a href="{{ route('products.index') }}">Cancel</a>

    </form>
</div>

</body>
</html>
