<?php

use App\Http\Controllers\categoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomStatusController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;
// main
// Route::get('/', function () {
//     return view('main');
//
// room
Route::get('/rooms/index', [RoomController::class, 'index'])->name('Room.index');
Route::get('/rooms/create', [RoomController::class, 'create'])->name('room.create');
Route::post('/rooms/store', [RoomController::class, 'store'])->name('room.store');
Route::get('/rooms/{room}/edit', [RoomController::class, 'edit'])->name('room.edit');
Route::put('/rooms/{room}', [RoomController::class, 'update'])->name('room.update');
Route::delete('/rooms/{room}', [RoomController::class, 'destroy'])->name('room.destroy');

// category (belongs to admin)
Route::get('/categories/index', [categoryController::class, 'index'])->name('category.index');
Route::get('/categories/create', [categoryController::class, 'create'])->name('category.create');
Route::post('/categories/store', [categoryController::class, 'store'])->name('category.store');
Route::get('/categories/{category}/edit', [categoryController::class, 'edit'])->name('category.edit');
Route::put('/categories/{category}', [categoryController::class, 'update'])->name('category.update');
Route::delete('/categories/{category}', [categoryController::class, 'destroy'])->name('category.destroy');


// dashbord
Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// profiles
// Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//user
Route::get('/users/index', [userController::class, 'index'])->name('user.index');
Route::get('/users/create', [userController::class, 'create'])->name('user.create');
Route::post('/users/store', [userController::class, 'store'])->name('user.store');
Route::get('/users/{user}/edit', [userController::class, 'edit'])->name('user.edit');
Route::put('/users/{user}', [userController::class, 'update'])->name('user.update');
Route::delete('/users/{user}', [userController::class, 'destroy'])->name('user.destroy');

//more info to add  or customer
Route::get('/Customer', [CustomerController::class, 'index'])->name('Customer.index');
// Route::get('/Customer/create', [CustomerController::class, 'create'])->name('Customer.create');
Route::post('/Customer/store', [CustomerController::class, 'store'])->name('Customer.store');

//transaction
Route::get('/transactions/index', [TransactionController::class, 'index'])->name('transaction.index');
Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transaction.create');
Route::post('/transactions/store', [TransactionController::class, 'store'])->name('transaction.store');
Route::get('/transactions/{transaction}/edit', [TransactionController::class, 'edit'])->name('transaction.edit');
Route::put('/transactions/{transaction}', [TransactionController::class, 'update'])->name('transaction.update');
Route::delete('/transactions/{transaction}', [TransactionController::class, 'destroy'])->name('transaction.destroy');

// Room Status
// Route::get('/RoomStatuses/index', [RoomStatusController::class, 'index'])->name('roomStatus.index');
// Route::get('/RoomStatuses/create', [RoomStatusController::class, 'create'])->name('roomStatus.create');
// Route::post('/RoomStatuses/store', [RoomStatusController::class, 'store'])->name('roomStatus.store');
// Route::get('/RoomStatuses/{roomStatus}/edit', [RoomStatusController::class, 'edit'])->name('roomStatus.edit');
// Route::put('/RoomStatuses/{roomStatus}', [RoomStatusController::class, 'update'])->name('roomStatus.update');
// Route::delete('/RoomStatuses/{roomStatus}', [RoomStatusController::class, 'destroy'])->name('roomStatus.destroy');