<?php
use App\Enum\HotelRoleEnum;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="">New User</h5><a href="{{ route('user.index') }}" class="btn btn-dark">back</a>
                        </div>
                    <div class="card-body">
                <form action="{{route('user.store')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control">
                                <div class="form-text text-danger">@error('name') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" name="email" class="form-control">
                                <div class="form-text text-danger">@error('email') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control">
                                <div class="form-text text-danger">@error('password') {{ $message }} @enderror</div>
                            </div>
                             <div class="mb-3">
                                <label class="form-label">phone_number</label>
                                <input type="text" name="phone_number" class="form-control">
                                <div class="form-text text-danger">@error('phone_number') {{ $message }} @enderror</div>
                            </div>
                    
                        <div class=" col-md-12">
                            <label for="role" class="form-label">Role</label>
                            <select id="role" name="role" class="form-select @error('password') is-invalid @enderror">
                                <option selected disabled hidden>Choose...</option>
                                @foreach (HotelRoleEnum::cases() as $case)
                                <option value="{{ $case->value}}">{{ $case->name}}</option>
                                    
                                @endforeach
                               
                            </select>
                            @error('role')
                                <div class="text-danger mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                            <button type="submit" class="btn btn-secondary">Submit</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>





                  
         