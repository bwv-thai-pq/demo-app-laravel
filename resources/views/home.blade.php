<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Document</title>
</head>
<body>
    <h1>Home</h1>

    @if ($user = Session::get('user'))
        <p>Hello {{ $user }}</p>
        <a href="{{route('login.logout')}}">Login out </a> |
        <a href="{{ route('products.index') }}">Product Management</a> |
        <a href="{{ route('brands.index') }}">Brand Management</a>
    @else
        <a href="{{route('login.index')}}">Login here </a> |
        <a href="{{ route('products.index') }}">Product List</a>
    @endif

</body>
</html>
