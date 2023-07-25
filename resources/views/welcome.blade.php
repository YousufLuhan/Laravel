<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Display Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="">
                {{-- success,update & delete message --}}
                @if (session("success"))
                <div class="alert alert-success mt-1" id="success">
                   {{ session("success") }}
                </div>
                @elseif (session("delete"))
                <div class="alert alert-danger mt-1" id="delete">
                   {{ session("delete") }}
                </div>
                @elseif (session("update"))
                <div class="alert alert-success mt-1" id="update">
                   {{ session("update") }}
                </div>
               @endif
               <div class=" mt-2 col-5" id="" >
                <form action="{{ route('search.view') }}" method="POST" >
                    @csrf
                    {{-- <input type="text" class="form-control" name="search" value="{{ old('search') }}">
                    <input type="submit" class="btn btn-primary btn-sm mt-2"> --}}
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="User phone number"  name="search"  value="{{ old('search') ?? ''}}"  autofocus />
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Button</button>
                      </div>
                </form>
    
             </div>


                 {{-- insert data button --}}
                <a href="/form" class="btn btn-primary btn-sm mt-3 mb-3">Add</a>
                <table class="table table-bordered table-striped">
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Phone</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    {{-- fetch data --}}
                    @foreach ($data as $value)
                        <tr align="center">
                            <td>{{ $value->Id }}</td>
                            <td>{{ $value->Name }}</td>
                            <td>{{ $value->Age }}</td>
                            <td>{{ $value->Phone }}</td>
                            <td>
                                {{-- code for link image --}}
                                <img src="{{ asset('storage/images/' . basename($value->Image)) }}" alt="User Image" height="40px" width="50px">
                            </td>
                            <td>
                                <a href="{{ route('edit.view',$value->Id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{ route('delete.view',$value->Id) }}" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="mt-3">
                    {{-- show pagination --}}
                    {{ $data->links("pagination::bootstrap-5") }}
                </div>
            </div>
        </div>
    </div>
     {{-- link with js file(public)  --}}
    <script src="{{ asset('js/script.js') }}"></script>
    {{-- <script src="{{ asset('js/search.js') }}"></script> --}}
</body>
</html>