<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\manage\admin\IndexController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

Route::get('/auth/forgot-password', [AuthController::class, 'showForgotPassword']);

Route::get('/auth/redirect', [AuthController::class, 'handleRedirectGoogle'])->name('google.redirect');
Route::get('/google/redirect/Xy2o53', [AuthController::class, 'handleCallbackGoogle'])->name('google.callback');

Route::get('/auth/register/mC3EtY3yxkqyyAqRnjKeDguCf/{token}', [AuthController::class, 'registerGoogleView']);
Route::put('/auth/register/mC3EtY3yxkqyyAqRnjKeDguCf/{token}', [AuthController::class, 'handleRegisterGoogle']);


Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/auth/register', [AuthController::class, 'handleSubmitRegister']);
Route::post('/auth/register', [AuthController::class, 'handleSubmitRegister']);
