<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{

    public function index(){

        $rooms = Room::all();

        return view('Rooms.index' , compact('rooms'));
    }




    public function create(){
        return view('Rooms.create');
    }
    public function store(Request $request)
    {
        Room::create([
            
            'category_id'=>$request->category_id,
            'number' => $request->number ,
            'capacity' => $request->capacity ,
            'price' => $request->price,
            'information' => $request->information,

           
        ]);
        $rooms = Room::all();
        return view('Rooms.index', compact('rooms'));
    }

    public function edit(Room $room){
        ////variable
        // $rooms = Room::all();
        return view('Rooms.edit', compact('room'));
    }

    public function update(Request $request, Room $room){
        $request->validate([
            'number' => 'required',
            'capacity' => 'required',
        ]);
        $room->update([
            'number' => $request->number ,
            'capacity' => $request->capacity ,
            'price' => $request->price,
           
        ]);
        $rooms = Room::all();
        return view('Rooms.index', compact('rooms'));

    }

    public function destroy(Room $room){
       
        $room->delete();

        return redirect()->route('Room.index');

    }
}
