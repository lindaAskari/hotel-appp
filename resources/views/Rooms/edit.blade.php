<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="">Edit Category</h5>
                        <a href="{{ route('Room.index') }}" class="btn btn-dark">back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('room.update', ['room' => $room->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label">number</label>
                                <input type="text" name="number" value="{{ $room->number }}" class="form-control">
                                <div class="form-text text-danger">
                                    @error('number')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                               <div class="mb-3">
                                <label class="form-label">capacity</label>
                                <input type="text" name="capacity" value="{{ $room->capacity }}" class="form-control">
                                <div class="form-text text-danger">
                                    @error('capacity')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                               <div class="mb-3">
                                <label class="form-label">price</label>
                                <input type="text" name="price" value="{{ $room->price }}" class="form-control">
                                <div class="form-text text-danger">
                                    @error('price')
                                        {{ $message }}
                                    @enderror
                                </div>
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
