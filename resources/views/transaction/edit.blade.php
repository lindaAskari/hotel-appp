<?php
use App\Models\Room;

use App\Models\User;
$rooms=Room::all();
$users=User::all();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Transaction</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="">Edit Transaction</h5>
                        <a href="{{ route('transaction.index') }}" class="btn btn-dark">back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('transaction.update', ['transaction' => $transaction->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class=" col-md-12">
                            <label for="room_id" class="form-label">Room</label>
                            <select id="room_id" name="room_id" class="form-select @error('password') is-invalid @enderror">
                                <option selected disabled hidden>Choose room...</option>
                                @foreach ($rooms as $room)
                                <option value="{{$room->id}}">{{ $room->number}}</option>
                                    
                                @endforeach
                               
                            </select>
                            @error('category_id')
                                <div class="text-danger mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                                <div class=" col-md-12">
                            <label for="user_id" class="form-label">User</label>
                            <select id="user_id" name="user_id" class="form-select @error('password') is-invalid @enderror">
                                <option selected disabled hidden>Choose user...</option>
                                @foreach ($users as $user)
                                <option value="{{$user->id}}">{{ $user->name}}</option>
                                    
                                @endforeach
                               
                            </select>
                            @error('roomStatuse_id')
                                <div class="text-danger mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                               <div class="mb-3">
                                <label class="form-label">Check In</label>
                                <input type="time" name="check_in" value="{{ $transaction->check_in }}" class="form-control">
                                <div class="form-text text-danger">
                                    @error('check_in')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                             <div class="mb-3">
                                <label class="form-label">Check Out</label>
                                <input type="time" name="check_out" value="{{ $transaction->check_out }}" class="form-control">
                                <div class="form-text text-danger">
                                    @error('check_out')
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
