<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\manage\admin\IndexController;
use App\Http\Controllers\manage\content\ContributeController;
use App\Models\PasswordReset;
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

// Content manage 
Route::get('/contribute/dashboard', [ContributeController::class, 'index']);


// authectication 
Route::get('/auth/login', [AuthController::class, 'handleSubmitLogin'])->name('login');
Route::post('/auth/login', [AuthController::class, 'handleSubmitLogin']);

Route::get('/auth/forget-password', [AuthController::class, 'showForgetPassword']);
Route::post('/auth/forget-password', [AuthController::class, 'handleForgetPassword']);

Route::get('/auth/reset-password/X35k5FaLl/{token}', [AuthController::class, 'showResetPassword'])->name('password.reset');
Route::post('/auth/reset-password/X35k5FaLl/{token}', [AuthController::class, 'handleResetPassword']);


Route::get('/auth/redirect', [AuthController::class, 'handleRedirectGoogle'])->name('google.redirect');
Route::get('/google/redirect/Xy2o53', [AuthController::class, 'handleCallbackGoogle'])->name('google.callback');

Route::get('/auth/register/mC3EtY3yxkqyyAqRnjKeDguCf/{token}', [AuthController::class, 'registerGoogleView']);
Route::put('/auth/register/mC3EtY3yxkqyyAqRnjKeDguCf/{token}', [AuthController::class, 'handleRegisterGoogle']);

Route::get('/auth/register', [AuthController::class, 'handleSubmitRegister'])->name('register');
Route::post('/auth/register', [AuthController::class, 'handleSubmitRegister']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
