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
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <title>Document</title>
</head>

<body>
    @if ($message = Session::get('message'))
        <script language="javascript">
            alert("{{ $message }}");
        </script>
    @endif
    <div class="container">
        <h2>Brand Management</h2>
        <a href="{{ route('home') }}">Back</a> <br>

        @if((Session::get('user') == 'admin'))
            <a href="{{ route('brands.create') }}">Add brand</a>
            <a href="{{route('login.logout')}}" class="float-right mb-3">Login out</a>
        @endif
        <table class="table" >
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Slug</th>
                    <th scope="col" >Action</th>

                </tr>
            </thead>
            <tbody>
                @isset($brands)
                    @foreach ($brands as $brand)
                        <tr data-id="{{ $brand->id }}">
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $brand->name }}</td>
                            <td>{{ $brand->slug }}</td>
                            <td ><span class="float-left mr-2"
                                style="display:{{ (Session::get('user') == 'admin') ? '' : 'none' }};">
                                <a type="button" class="btn btn-primary"
                                    href="{{ route('brands.edit', $brand->id) }}">Edit</a>
                                </span>
                                <span style="display:{{ (Session::get('user') == 'admin') ? '' : 'none' }};" >
                                    <form action="">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form></span>
                            </td>

                        </tr>
                    @endforeach
                @endisset

            </tbody>
        </table>
    </div>


</body>

<script language="javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.btn-danger').on('click', function(e) {
            e.preventDefault();
            var id = $(this).closest('tr').data('id');
            // Swal.fire({
            //     title: "Are you sure?",
            // });
            // console.log(id);
            if (!confirm('Are you sure?')) {
                return false;
            }
            var url = '{{ route('brands.destroy', ':id') }}';
            url = url.replace(':id', id);
            // console.log(url);
            $.ajax({
                url: url,
                type: 'delete',
                success: function(response) {
                    $('tr[data-id="' + response.id + '"]').remove();
                    alert(response.message);
                },
                error: function(response) {
                    alert(response.responseJSON.message);
                }
            })
        });
    });
</script>

</html>
