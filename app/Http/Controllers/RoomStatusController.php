<?php

namespace App\Http\Controllers;

use App\Models\room_status;
use Illuminate\Http\Request;

class RoomStatusController extends Controller
{

    public function index(){
        $room_statuses = room_status::all();

        return view('roomStatus.index' , compact('room_statuses'));
    }




    public function create(){
        return view('roomStatus.create');
    }
    public function store(Request $request)
    {
 

        room_status::create([
            'name' => $request->name ,
            'code' => $request->code,
            'information' => $request->information ,
        ]);
        $room_statuses = room_status::all();
        return view('roomStatus.index', compact('room_statuses'));
    }

    public function edit(room_status $room_status){
        // $room_statuses =room_status::all();
        return view('roomStatus.edit', compact('room_statuse'));
    }

    public function update(Request $request, room_status $room_status){
        
    
        $room_status->update([
            'name' => $request->name ,
            'code' => $request->code,
            'information' => $request->information ,
           
        ]);
        $room_statuses = room_status::all();
        return view('roomStatus.index', compact('room_statuses'));

    }

    public function destroy(room_status $room_status){
       
        $room_status->delete();

        return redirect()->route('roomStatus.index');

    }
}
