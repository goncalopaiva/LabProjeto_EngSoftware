<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PDFController;


use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TimetableController;

use App\Models\Input;
use App\Models\Room;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



//ROOMS
Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
Route::get('/rooms/create', [RoomController::class, 'create'])->name('rooms.create');
Route::post('/rooms', [RoomController::class,'store'])->name('rooms.store');
Route::get('/rooms/{room}', [RoomController::class,'show'])->name('rooms.show');
Route::get('/rooms/{room}/edit', [RoomController::class,'edit'])->name('rooms.edit');
Route::put('/rooms/{room}', [RoomController::class,'update'])->name('rooms.update');
Route::delete('/rooms/{room}', [RoomController::class,'destroy'])->name('rooms.destroy');

//USERS
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class,'store'])->name('users.store');
Route::get('/users/{user}', [UserController::class,'show'])->name('users.show');
Route::get('/users/{user}/edit', [UserController::class,'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class,'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class,'destroy'])->name('users.destroy');

//TIMETABLES
Route::get('/timetables', [TimetableController::class, 'index'])->name('timetables.index');
Route::get('/timetables/{room}', [TimetableController::class,'show'])->name('timetables.show');
Route::get('/timetables/create', [TimetableController::class, 'create'])->name('timetables.create');
Route::post('/timetables', [TimetableController::class,'store'])->name('timetables.store');

Route::any('/search',function(){
    $q = Room::get ( 'idsala' );
    $room = Room::where('idsala','LIKE','%'.$q.'%')->get();
    if(count($room) > 0)
        return view('timetable.show, $room->idsala')->withDetails($room)->withQuery ( $q );
    else return view ('timetable.index')->withMessage('No Details found. Try to search again !');
});






/*AUTH*/

// Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
