<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoomtypeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\StaffDepartment;
use App\Http\Controllers\StaffController;
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
Route::get('admin/roomtype/{id}/delete', [RoomtypeController::class, 'destroy']);
Route::resource('admin/roomtype',RoomtypeController::class);

// Room Routes
Route::get('admin/rooms/{id}/delete', [RoomController::class, 'destroy']);
Route::resource('admin/rooms',RoomController::class);

// Customer Routes
Route::get('admin/customer/{id}/delete', [CustomerController::class, 'destroy']);
Route::resource('admin/customer',CustomerController::class);

// Delete Roomtype Image
Route::get('admin/roomtypeimage/delete/{id}', [RoomtypeController::class, 'destroy_image']);

// Department Routes
Route::get('admin/department/{id}/delete', [StaffDepartment::class, 'destroy']);
Route::resource('admin/department',StaffDepartment::class);
// Staff payment
Route::get('admin/staff/payments/{id}', [StaffController::class,'all_payments']);
Route::get('admin/staff/payment/{id}/add', [StaffController::class,'add_payment']);
Route::post('admin/staff/payment/{id}', [StaffController::class, 'save_payment']);
Route::get('admin/staff/payment/{id}/{staff_id}/delete', [StaffController::class, 'delete_payment']);
// Staff Routes
Route::get('admin/staff/{id}/delete', [StaffController::class, 'destroy']);
Route::resource('admin/staff',StaffController::class);
