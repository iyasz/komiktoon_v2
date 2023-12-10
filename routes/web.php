<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\manage\admin\IndexController;
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
    return view('main.index');
});

Route::get('/panel/admin/dashboard', [IndexController::class, 'index']);

// authectication 
Route::get('/auth/login', [AuthController::class, 'handleSubmitLogin']);
Route::post('/auth/login', [AuthController::class, 'handleSubmitLogin']);

Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/auth/register', [AuthController::class, 'handleSubmitRegister']);
Route::post('/auth/register', [AuthController::class, 'handleSubmitRegister']);
