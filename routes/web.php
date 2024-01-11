<?php

use App\Http\Controllers\DepartementController;
use App\Http\Controllers\PositionController;
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
