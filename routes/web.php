<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PDFController;


use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TimetableController;
use App\Http\Controllers\EmailController;

use App\Models\Input;
use App\Models\Room;
use App\Models\User;
use App\Models\Timetable;


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
Route::get('/search', [RoomController::class, 'search'])->name('rooms.search');

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
Route::get('/timetables/{room}/create', [TimetableController::class, 'create'])->name('timetables.create');
Route::post('/timetables', [TimetableController::class,'store'])->name('timetables.store');

//PDF
Route::get('generate-pdf/{room}', [PDFController::class, 'generatePDF'])->name('timetables.createPDF');



/*AUTH*/

// Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('staff/home', [HomeController::class, 'staffHome'])->name('staff.home')->middleware('is_staff');
Route::get('teacher/home', [HomeController::class, 'teacherHome'])->name('teacher.home')->middleware('is_teacher');


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

