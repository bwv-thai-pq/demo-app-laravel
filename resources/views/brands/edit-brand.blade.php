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
    <h2>Edit Brand</h2>

    <form novalidate action="{{ route('brands.update', $brand->id) }}" method="POST">
        @csrf
        @method('put')
        <label for="name">Brand name:</label><br>
        <input type="text" id="name" name="name"
            class="form-control @error('name') is-invalid @enderror" value="{{ $brand->name }}">
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
        <label for="slug">Slug:</label><br>
        <input type="text" id="slug" name="slug"
            class="form-control @error('slug') is-invalid @enderror" value="{{ $brand->slug }}">
        @error('slug')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br><br>
        <input type="submit" value="Submit">
        <a href="{{ route('brands.index') }}">Cancel</a>

    </form>
</div>

</body>
</html>
