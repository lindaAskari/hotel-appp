<?php
use App\Enum\HotelRoleEnum;

use App\Models\Category;

$categories=Category::all();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Room</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="">New Room</h5><a href="{{ route('Room.index') }}" class="btn btn-dark">back</a>
                        </div>
                    <div class="card-body">
                <form action="{{route('room.store')}}" method="POST">
                            @csrf

                            <div class=" col-md-12">
                            <label for="category_id" class="form-label">category</label>
                            <select id="category_id" name="category_id" class="form-select @error('password') is-invalid @enderror">
                                <option selected disabled hidden>Choose category...</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{ $category->title}}</option>
                                    
                                @endforeach
                               
                            </select>
                            @error('category_id')
                                <div class="text-danger mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                            {{-- <div class=" col-md-12">
                            <label for="roomStatuse_id" class="form-label">roomStatuse</label>
                            <select id="roomStatuse_id" name="roomStatuse_id" class="form-select @error('password') is-invalid @enderror">
                                <option selected disabled hidden>Choose roomStatuse...</option>
                                @foreach ($roomStatuses as $roomStatus)
                                <option value="{{$roomStatus->id}}">{{ $roomStatus->name}}</option>
                                    
                                @endforeach
                               
                            </select>
                            @error('roomStatuse_id')
                                <div class="text-danger mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> --}}
                            <div class="mb-3">
                                <label class="form-label">Number</label>
                                <input type="text" name="number" class="form-control">
                                <div class="form-text text-danger">@error('number') {{ $message }} @enderror</div>
                            </div>
                            {{-- //date --}}
                             {{-- <div class="mb-3">
                                <label class="form-label">Production Date</label>
                                <input type="date" name="production_date" class="form-control">
                                <div class="form-text text-danger">@error('production_date') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Expire Date</label>
                                <input type="date" name="expire_date" class="form-control">
                                <div class="form-text text-danger">@error('expire_date') {{ $message }} @enderror</div>
                            </div> --}}
                              <div class="mb-3">
                                <label class="form-label">Capacity</label>
                                <input type="text" name="capacity" class="form-control">
                                <div class="form-text text-danger">@error('capacity') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Price</label>
                                <input type="text" name="price" class="form-control">
                                <div class="form-text text-danger">@error('price') {{ $message }} @enderror</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Information</label>
                                <input type="text" name="information" class="form-control">
                                <div class="form-text text-danger">@error('information') {{ $message }} @enderror</div>
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





                  
         