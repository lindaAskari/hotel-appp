<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{

    public function index(){
        $users = User::all();

        return view('user.index' , compact('users'));
    }




    public function create(){
        return view('user.create');
    }
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|min:3',
        //     'email' => 'required',
        //     'password' => 'required|min:4',
        //     'phone_number' => 'required|min:11'

        // ]);
        
       
        // $user=new User();
        // $user=User::finde($request->id);
        // $user ->name=$request->name; 
        // $user ->email=$request->email; 
        // $user ->password=$request->password; 
        // $user ->phone_number=$request->phone_number;   
        // $user ->status=$request->status; 
        // $user->save();

        User::create([
            'name' => $request->name ,
            'email' => $request->email ,
            'password' => $request->password,
            'phone_number' => $request->phone_number,
            'role' => $request->role
            // 'status' => $request-> status 
        ]);
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function edit(User $user){
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, User $user){
        // $request->validate([
        //     'name' => 'required|min:3',
        //     'email' => 'required',
        //     'password' => 'required|min:4',
        //     'phone_number' => 'required|min:3'
        // ]);
        // $user=User::finde($request->id);
        // $user ->name=$request->name; 
        // $user ->email=$request->email; 
        // $user ->password=$request->password; 
        // $user ->phone_number=$request->phone_number;   
        // $user->save();
        $user->update([
            'name' => $request->name ,
            'email' => $request->email ,
            
            'phone_number' => $request->phone_number,
           
        ]);
        $users = User::all();
        return view('user.index', compact('users'));

    }

    public function destroy(User $user){
       
        $user->delete();

        return redirect()->route('user.index');

    }
}
