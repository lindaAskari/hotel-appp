<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        return view('profile.MoreInformation');
    }
    public function store(Request $request){
    User::create([
    'name' => $request->name , 
    'address' => $request->address ,
    'gender' => $request->gender , 
    'job' => $request->job, 
    'birthdate' => $request->birthdate

    ]);
    return redirect()->route('profile.edit');
        
    }
}
   

      
