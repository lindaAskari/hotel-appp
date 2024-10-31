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
                        <h5 class="">Adding More Information</h5>
                        <a href="{{ route('dashboard') }}" class="btn btn-dark">back</a>

                    </div>
                    <div class="card-body">
                        <form action="{{ route('Customer.store')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control">
                                <div class="form-text text-danger">@error('name') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <input type="text" name="address" class="form-control">
                                <div class="form-text text-danger">@error('address') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Gender</label>
                                <input type="text" name="gender" class="form-control">
                                <div class="form-text text-danger">@error('gender') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Job</label>
                                <input type="text" name="job" class="form-control">
                                <div class="form-text text-danger">@error('job') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Birthdate</label>
                                <input type="date" name="birthdate" class="form-control">
                                <div class="form-text text-danger">@error('birthdate') {{ $message }} @enderror</div>
                            </div>
                            <button type="submit" class="btn btn-secondary">Save</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>
