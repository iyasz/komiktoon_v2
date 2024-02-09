<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\front\IndexController as FrontIndexController;
use App\Http\Controllers\front\ReadController;
use App\Http\Controllers\manage\admin\banner\BannerController;
use App\Http\Controllers\manage\admin\category\CategoryController;
use App\Http\Controllers\manage\admin\IndexController;
use App\Http\Controllers\manage\content\contribute\ChapterController;
use App\Http\Controllers\manage\content\contribute\ContentController;
use App\Http\Controllers\manage\content\contribute\ContributeController;
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

// front 
Route::get('/', [FrontIndexController::class, 'index']);
Route::get('/search', [FrontIndexController::class, 'search']);
Route::get('/privacy-policy', [FrontIndexController::class, 'policyPrivacy']);
Route::get('/terms-of-use', [FrontIndexController::class, 'termsOfUse']);

Route::get('/komik/{slug}/list', [ReadController::class, 'index']);
Route::post('/komik/{slug}/list', [ReadController::class, 'handleFavoritContent']);
Route::put('/komik/{slug}/list', [ReadController::class, 'handleRatingContent']);
Route::patch('/komik/{slug}/list', [ReadController::class, 'handleCommentContent']);
Route::delete('/komik/{slug}/list/{id}', [ReadController::class, 'handleDeleteComment']);

Route::get('/{slugContent}/{slugChapter}/view', [ReadController::class, 'chapter']);
Route::post('/{slugContent}/{slugChapter}/view', [ReadController::class, 'handleLikeChapter']);

// Admin Panel 
Route::get('/panel/admin/dashboard', [IndexController::class, 'index']);
Route::resource('/panel/category', CategoryController::class);

Route::get('/panel/background/dashboard', [BannerController::class, 'dashboardBannerView']);

// Content manage 
Route::get('/contribute/dashboard', [ContributeController::class, 'index']);
Route::get('/contribute/content', [ContentController::class, 'index']);
Route::post('/contribute/content', [ContentController::class, 'store']);
Route::get('/contribute/content/create', [ContentController::class, 'create']);
Route::post('/contribute/content/create', [ContentController::class, 'getValidationImage']);

Route::get('/contribute/chapter/{slug}', [ChapterController::class, 'index']);
Route::post('/contribute/chapter/{slug}', [ChapterController::class, 'getValidationChaptersImage']);
Route::get('/contribute/chapter/create/{slug}', [ChapterController::class, 'create']);
Route::post('/contribute/chapter/create/{slug}', [ChapterController::class, 'getValidationImage']);

Route::post('/contribute/chapter/store/{slug}', [ChapterController::class, 'handleInsertChapter']);

Route::get('/contribute/report', [ContributeController::class, 'report']);
Route::get('/contribute/warning', [ContributeController::class, 'warning']);
Route::get('/contribute/contract', [ContributeController::class, 'contract']);

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
