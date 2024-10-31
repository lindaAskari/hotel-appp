<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>List Of Rooms</title>
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10">

              <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="">Rooms</h5>
            <a href="{{ route('room.create') }}" class="btn btn-dark">create</a>
             <a href="{{ route('dashboard') }}" class="btn btn-dark">back</a>
        </div>
        <div class="card-body">
            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th>number</th>
                        <th>capacity</th>
                        <th>price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rooms as $room)
                        <tr>
                            <td>{{ $room->number }}</td>
                            <td>{{ $room->capacity }}</td>
                            <td>{{ $room->price }}</td>
                            <td class="d-flex">
                                <a href="{{ route('room.edit', ['room' => $room->id]) }}" class="btn btn-sm btn-secondary">Edit</a>
                            <form action="{{ route('room.destroy', ['room' => $room->id]) }}" method="POST">
                                     @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger ms-2">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

        </div>
    </div>
</div>
</html>
