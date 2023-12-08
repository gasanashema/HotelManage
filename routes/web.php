<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoomtypeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\StaffDepartment;
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
    return view('home');
});

Route::get('admin/login', [AdminController::class, 'login']);
Route::post('admin/login', [AdminController::class, 'check_login']);
Route::get('admin/logout', [AdminController::class, 'logout']);

// running the admin dashboard
Route::get('admin',function(){
    return view('dashboard');
});


// Roomtype Routes
Route::resource('admin/roomtype',RoomtypeController::class);
Route::get('admin/roomtype/{id}/delete', [RoomtypeController::class, 'destroy']);

// Room Routes
Route::resource('admin/rooms',RoomController::class);
Route::get('admin/rooms/{id}/delete', [RoomController::class, 'destroy']);

// Customer Routes
Route::resource('admin/customer',CustomerController::class);
Route::get('admin/customer/{id}/delete', [CustomerController::class, 'destroy']);

// Delete Roomtype Image
Route::get('admin/roomtypeimage/delete/{id}', [RoomtypeController::class, 'destroy_image']);

// Department Routes
Route::resource('admin/department',StaffDepartment::class);
Route::get('admin/department/{id}/delete', [StaffDepartment::class, 'destroy']);
