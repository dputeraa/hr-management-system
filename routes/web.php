<?php

use App\Http\Controllers\DepartementController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// DEPARTEMENT
Route::post('departement', [DepartementController::class, 'store']); //create
Route::get('departement', [DepartementController::class, 'index']);
Route::get('departement/create', [DepartementController::class, 'create']);
Route::get('departement/{id}/edit', [DepartementController::class, 'edit']);
Route::patch('departement/{id}', [DepartementController::class, 'update']); //update
Route::get('departement/{id}/delete', [DepartementController::class, 'destroy']); //delete

// POSITION
Route::post('position', [PositionController::class, 'store']); //create
Route::get('position', [PositionController::class, 'index']);
Route::get('position/create', [PositionController::class, 'create']);
Route::get('position/{id}/edit', [PositionController::class, 'edit']);
Route::patch('position/{id}', [PositionController::class, 'update']); //update
Route::get('position/{id}/delete', [PositionController::class, 'destroy']); //delete

// EMPLOYEE
Route::post('employee', [EmployeeController::class, 'store']); //create
Route::get('employee', [EmployeeController::class, 'index']);
Route::get('employee/create', [EmployeeController::class, 'create']);
Route::get('employee/{id}', [EmployeeController::class, 'show']);
Route::get('employee/{id}/edit', [EmployeeController::class, 'edit']);
Route::patch('employee/{id}', [EmployeeController::class, 'update']); //update
Route::get('employee/{id}/delete', [EmployeeController::class, 'destroy']); //delete

// USER / ADMIN
Route::post('user', [UserController::class, 'store']); //create
Route::get('user', [UserController::class, 'index']);
Route::get('user/create', [UserController::class, 'create']);
Route::get('user/{id}/edit', [UserController::class, 'edit']);
Route::patch('user/{id}', [UserController::class, 'update']); //update
Route::get('user/{id}/delete', [UserController::class, 'destroy']); //delete

// LEAVE
Route::post('leave', [LeaveController::class, 'store']); //create
Route::get('leave', [LeaveController::class, 'index']);
Route::get('leave/create', [LeaveController::class, 'create']);
Route::get('leave/{id}/edit', [LeaveController::class, 'edit']);
Route::patch('leave/{id}', [LeaveController::class, 'update']); //update
Route::get('leave/{id}/delete', [LeaveController::class, 'destroy']); //delete
