<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>

<body>
    <div class="container w-25">
        <h1>Login</h1>
        <p>(username: admin/ password: admin)</p>
        <form action="{{ route('login.confirm') }}" method="POST">
            @csrf

            @if ($error = Session::get('error'))
                <p id="error">{{ $error }}</p>
            @endif
            <div>
                <label for="fname" class="form-label">Username:</label><br>
                <input type="text" id="fname" name="name"
                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="lname" class="form-label">Password:</label><br>
                <input type="password" id="lname" name="pwd"
                    class="form-control @error('pwd') is-invalid @enderror"
                    value="{{ old('pwd') }}">
                @error('pwd')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <br>
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
</body>

</html>
