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
                <form action="{{ route('editUser.view',$data->Id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 mt-2" align='center'>
                        <img src="{{ asset('storage/images/' . basename($data->Image)) }}" alt="User Image" height="100px" width="150px">
                    </div>
                    <div class="mb-3">
                        <label class="label-con">Image</label>
                        <input type="hidden" class="form-control" value="{{ $data->Image }}" name="image">
                        <input type="file" class="form-control"  name="new">
                    </div>
                    <div class="mb-3">
                        <label class="label-con">Name</label>
                        <input type="text" class="form-control" value="{{ $data->Name }}" name="name">
                    </div>
                    <div class="mb-3">
                        <label class="label-con">Age</label>
                        <input type="text" class="form-control" value="{{ $data->Age }}" name="age">
                    </div>

                    <div class="mb-3">
                        <label class="label-con">Gender</label>
                        <input type="radio" value="Male" name="gender" @if ($data->Gender ==="Male")checked @endif>Male 
                        <input type="radio" value="Female" name="gender" @if ($data->Gender ==="Female")checked @endif>Female
                    </div>
                    <div class="mb-3">
                        <label class="label-con">Groups</label>
                        <select class="form-select" aria-label="Default select example" name="groups">
                            {{-- <option selected>Open this select menu</option> --}}
                            <option value="Science" @if($data->Groups === 'Science') selected @endif>Science</option>
                            <option value="Arts" @if($data->Groups === 'Arts') selected @endif>Arts</option>
                            <option value="Commerce" @if($data->Groups === 'Commerce') selected @endif>Commerce</option>
                          </select>
                    </div>
                    <div class="mb-3">
                        <label class="label-con">Phone</label>
                        <input type="text" class="form-control" value="{{ $data->Phone }}" name="phone">
                    </div>

                    
    
                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>