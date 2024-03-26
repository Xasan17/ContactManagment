<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



//Route::post('/register', [AuthController::class, 'register']);
//Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/register/verify', [AuthController::class, 'confirmationEmail']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware('check.token')->middleware('auth:sanctum')->group(function () {
Route::get('/contacts', [ContactsController::class, 'index']);
Route::get('/contacts/{contactId}', [ContactsController::class, 'show']);
Route::post('/contacts', [ContactsController::class, 'store']);
Route::post('/contacts/{id}', [ContactsController::class, 'update']);
});
