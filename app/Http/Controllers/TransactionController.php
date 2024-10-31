<?php

namespace App\Http\Controllers;

use App\Models\transaction;
use Illuminate\Http\Request;
use App\Helpers\DateHelper;
use Morilog\Jalali\Jalalian;

class TransactionController extends Controller
{
    public function index(){
        // $transactions = transaction::all();
        // $adDate=$transactions->check_out;
        // $solarDate=DateHelper::toJalali($adDate);
        ////////////////////////////
        // $transactions->check_out;
        //$adDate = $request->input('check_in');
        // $solarDate = DateHelper::toJalali($adDate);
        // $adDate2 = $request->input('check_out');
        // $solarDate2 = DateHelper::toJalali($adDate2);
    // Store the solar date in your database
        // $transaction = new Transaction();
     
        // $transaction->check_out = $solarDate2->format('Y-m-d');
        // $transaction->check_in = $solarDate->format('Y-m-d');
        // $transaction->save();
        


       

       
            $transactions = Transaction::all();
            $transactions->map(function ($transaction) {
                $x=$transaction->check_in= Jalalian::forge($transaction->check_in )->format('Y-m-d');
                // return $transaction;
                $y=$transaction->check_out= Jalalian::forge($transaction->check_out )->format('Y-m-d');
                return $x & $y;

            });
          
            
       

        return view('transaction.index' , compact('transactions'));
    }
    public function create(){
        return view('transaction.create');
    }
    public function store(Request $request)
    {
    //     //تاریخی که وارد میکنیم بزرگتر باشه از تاریخ ورود های قبلی در حالیکه تاریخ خارج شدن فعلی کوچکتر باشد از تاریخ های خروج قبلی
    //     $shifts=transaction::where('check_in' , '<' , $request->check_in)->where('check_out' , '>' , $request->check_out)->count();
    //     //تاریخ ورود های قبلی بزرگتر باشند از تاریخ های ورودی فعلی درحالیکه خروج فعلی کمتر باشد از ورود قبلی 
    //     $times=transaction::where('check_in' , '>' , $request->check_in)->where('check_in' , '<' , $request->check_out)->count(); 
    //     //خروج های قبلی بزرگتر باشند از ورودی های فعلی درحالیکه خروج های فعلی بزرگتر اند از خروج های قبلی
    //     $records=transaction::where('check_out' , '>' , $request->check_in)->where('check_out' , '<' , $request->check_out)->count();     
    //     //ورود های قبلی بزرگ تر اند از ورود های فعلی درحالیکه خروج های فعلی بزرگتر اند از خروج های قبلی  
    //     $boxes=transaction::where('check_in' , '>' , $request->check_in)->where('check_out' , '<' , $request->check_out)->count();       

    //    if ($shifts==0&& $times==0 && $records==0 && $boxes==0) {
    // }else{
    //     return (' u cant reserve this room.... the timing is not ok');
    // }

    // app/Http/Controllers/RoomController.php
        $room_id = $request->room_id;
        $start_date = $request->check_in;
        $end_date =  $request->check_out;

        // Check if the room is already reserved for the specified date range
        $existingReservation = transaction::where('room_id', $room_id)
            ->where(function ($query) use ($start_date, $end_date) {
                $query->whereBetween('check_in', [$start_date, $end_date])
                    ->orWhereBetween('check_out', [$start_date, $end_date])
                    ->orWhere(function ($query) use ($start_date, $end_date) {
                        $query->where('check_in', '<=', $start_date)
                            ->where('check_out', '>=', $end_date);
                    });
            })
            ->first();

        if ($existingReservation) {
            // Room is already reserved, return an error
            return (' u cant reserve this room.... the timing is not ok');
        }
        //validation

        // Create a new reservation
        transaction::create([
            'user_id' => $request->user_id ,
            'room_id' => $request->room_id,
        //     // $adDate = $request->check_in,
        //     // $solarDate =JalaliHelper::toJalali($adDate)->format('Y-m-d'),
            
            'check_in' =>  $request->check_in ,
            'check_out' => $request->check_out

        ]);

        // $adDate = $request->input('check_in');
        // $solarDate = DateHelper::toJalali($adDate);
        // $adDate2 = $request->input('check_out');
        // $solarDate2 = DateHelper::toJalali($adDate2);
    // Store the solar date in your database
        // $transaction = new Transaction();
        // $transaction->$request->user_id;
        // $transaction->$request->room_id;
        // $transaction->check_out = $solarDate2->format('Y-m-d');
        // $transaction->check_in = $solarDate->format('Y-m-d');
        // $transaction->save();
          // foreach ($shifts as  $shift) {
        //     $enter=Carbon::parse($shift->start)->format('H');
        //     $exit=Carbon::parse($shift->end)->format('H');

        // $reservation = new Reservation();
        // $reservation->room_id = $room_id;
        // $reservation->start_date = $start_date;
        // $reservation->end_date = $end_date;
        // $reservation->guest_name = $request->input('guest_name');
        // $reservation->save();
        $transactions = transaction::all();
        return view('transaction.index', compact('transactions'));
        // return response()->json(['message' => 'Room reserved successfully']);
    }

    public function edit(transaction $transaction){
        return view('transaction.edit', compact('transaction'));
    }

    public function update(Request $request, transaction $transaction){
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
       
        $transaction->update([
            'user_id' => $request->user_id ,
            'room_id' => $request->room_id,
            'check_in' =>  $request->check_in ,
            'check_out' => $request->check_out
           
        ]);
        $transactions = transaction::all();
        return view('transaction.index', compact('transactions'));

    }

    public function destroy(transaction $transaction){
       
        $transaction->delete();

        return redirect()->route('transaction.index');

    }
}
       
   
    