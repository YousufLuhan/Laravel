<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <form action="{{ route('addUser.view') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="label-con">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                    </div>
                    {{-- error message for name--}}
                         @error("name")
                            <div class="mb-3 alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    <div class="mb-3">
                        <label class="label-con">Age</label>
                        <input type="text" class="form-control" name="age" value="{{ old("age") }}">
                    </div>
                    {{-- error message for age --}}
                    @error("age")
                        <div class="mb-3 alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    <div class="mb-3">
                        <label class="label-con">Phone</label>
                        <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                    </div>
                    {{-- error message for phone--}}
                    @error("phone")
                        <div class="mb-3 alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    <div class="mb-3">
                        <label class="label-con">Gender</label>
                        <input type="radio" name="gender" value="Male" {{ old('gender')==='Male' ? 'checked' : '' }} >Male
                        <input type="radio" value="Female" {{ old("gender")==="Female" ? "checked" : ''  }} name="gender">Female
                    </div>
                    @error("gender")
                        <div class="mb-3 alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    <div class="mb-3">
                        <select class="form-select" aria-label="Default select example" name="groups">
                            {{-- <option selected>Open this select menu</option> --}}
                            <option value="selected">None</option>
                            <option value="Science" {{ old("groups") ==="Science" ? "selected" : "" }} >Science</option>
                            <option value="Arts" {{ old("groups") ==="Arts" ? "selected" : "" }}>Arts</option>
                            <option value="Commerce" {{ old("groups") ==="Commerce" ? "selected" : "" }}>Commerce</option>
                          </select>
                    </div>
                       @error("groups")
                        <div class="mb-3 alert alert-danger">
                            {{ $message }}
                        </div>
                        @enderror
                    <div class="mb-3">
                        <label class="label-con">Image</label>
                        <input type="file" class="form-control" name="image" >
                    </div>
                    {{-- error message for  image--}}
                     @error("image")
                        <div class="mb-3 alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>