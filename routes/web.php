<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\front\IndexController as FrontIndexController;
use App\Http\Controllers\front\ReadController;
use App\Http\Controllers\manage\admin\account\AccountController;
use App\Http\Controllers\manage\admin\banner\BannerController;
use App\Http\Controllers\manage\admin\category\CategoryController;
use App\Http\Controllers\manage\admin\confirmation\ConfirmationController;
use App\Http\Controllers\manage\admin\content\ContentManageController;
use App\Http\Controllers\manage\admin\IndexController;
use App\Http\Controllers\manage\admin\takedown\TakedownController;
use App\Http\Controllers\manage\admin\warning\WarningController;
use App\Http\Controllers\manage\content\contribute\ChapterController;
use App\Http\Controllers\manage\content\contribute\ContentController;
use App\Http\Controllers\manage\content\contribute\ContributeController;
use App\Http\Controllers\manage\content\contribute\ReportController;
use App\Http\Controllers\manage\content\contribute\UserAccountController;
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

Route::get('/genre', [FrontIndexController::class, 'genre']);
Route::get('/populer', [FrontIndexController::class, 'populer']);

Route::get('/komik/{slug}/list', [ReadController::class, 'index']);
Route::get('/{slugContent}/{slugChapter}/view', [ReadController::class, 'chapter']);

Route::middleware(['auth'])->group(function () {
    
    // front 
    Route::get('/favorit', [FrontIndexController::class, 'favorit']);
    Route::post('/komik/{slug}/list', [ReadController::class, 'handleFavoritContent']);
    Route::put('/komik/{slug}/list', [ReadController::class, 'handleRatingContent']);
    Route::patch('/komik/{slug}/list', [ReadController::class, 'handleCommentContent']);
    Route::delete('/komik/{slug}/list/{id}', [ReadController::class, 'handleDeleteComment']);
    
    Route::post('/{slugContent}/{slugChapter}/view', [ReadController::class, 'handleLikeChapter']);
    Route::post('/{slugContent}/{slugChapter}/view/report', [ReadController::class, 'handleReportContent']);

    Route::get('/user/my-account', [UserAccountController::class, 'index']);
    Route::post('/user/my-account', [UserAccountController::class, 'handleValidationImage']);
    Route::put('/user/my-account', [UserAccountController::class, 'updateUserAccount']);

    Route::get('/history', [FrontIndexController::class, 'history']);

    Route::middleware(['onlyAdmin'])->group(function () {
        
        // Admin Panel 
        Route::get('/panel/admin/dashboard', [IndexController::class, 'index']);
        Route::post('/panel/admin/dashboard', [IndexController::class, 'getDataKomikSelect']);

        Route::resource('/panel/category', CategoryController::class);

        Route::get('/panel/komik/list', [ContentManageController::class, 'index']);
        Route::put('/panel/komik/{slug}/block', [ContentManageController::class, 'block']);
        Route::get('/panel/komik/{slug}/detail', [ContentManageController::class, 'detail']);
        Route::get('/panel/warning/list', [WarningController::class, 'index']);
        
        Route::post('/panel/admin/getvalidationimage', [IndexController::class, 'handleValidateImage']);
        
        Route::get('/panel/my-account', [AccountController::class, 'index']);
        Route::put('/panel/my-account', [AccountController::class, 'update']);
        
        Route::get('/panel/takedown/content', [TakedownController::class, 'index']);
        Route::put('/panel/takedown/content/{slug}/recovery', [TakedownController::class, 'recovery']);
        
        Route::get('/panel/confirmation/content', [ConfirmationController::class, 'index']);
        Route::get('/panel/confirmation/content/{slug}/detail', [ConfirmationController::class, 'detail']);
        Route::post('/panel/confirmation/content/{slug}', [ConfirmationController::class, 'confirm']);
        Route::put('/panel/confirmation/content/{slug}', [ConfirmationController::class, 'rejected']);
        
        Route::get('/panel/background/auth', [BannerController::class, 'banners']);
        Route::get('/panel/background/auth/create', [BannerController::class, 'create']);
        Route::post('/panel/background/auth/create', [BannerController::class, 'store']);
        Route::delete('/panel/background/auth/{id}', [BannerController::class, 'delete']);
    });

    
    // Content manage 
    Route::get('/contribute/dashboard', [ContributeController::class, 'index']);
    Route::get('/contribute/content', [ContentController::class, 'index']);
    Route::post('/contribute/content', [ContentController::class, 'store']);
    Route::get('/contribute/content/create', [ContentController::class, 'create']);
    Route::post('/contribute/content/create', [ContentController::class, 'getValidationImage']);
    
    Route::delete('/contribute/content/{slug}/delete', [ContentController::class, 'handleDeleteContent']);
    
    Route::get('/contribute/content/{slug}/chapter', [ChapterController::class, 'handleListChapter']);
    Route::put('/contribute/content/{slug}/chapter', [ChapterController::class, 'changeStatusChapter']);

    Route::get('/contribute/content/{slug}/edit', [ContentController::class, 'handleEditContent']);
    Route::post('/contribute/content/{slug}/edit', [ContentController::class, 'handleUpdateContent']);
    Route::get('/contribute/content/{slug}/banner/edit', [ContentController::class, 'handleEditContent2']);
    Route::put('/contribute/content/{slug}/banner/edit', [ContentController::class, 'handleUpdateContent2']);
    
    Route::get('/contribute/chapter/{slugContent}/{slugChapter}/edit', [ChapterController::class, 'showEditChapter']);
    Route::post('/contribute/chapter/{slugContent}/{slugChapter}/edit', [ChapterController::class, 'handleUpdateChapter']);
    
    Route::get('/contribute/content/update/{slug}', [ContentController::class, 'handleUpdateConfirmed']);
    Route::post('/contribute/content/update/{slug}', [ContentController::class, 'handleBgBannerValidation']);
    Route::post('/contribute/content/update/{slug}/char', [ContentController::class, 'handleCharImageValidation']);
    Route::post('/contribute/content/update/{slug}/insert', [ContentController::class, 'storeUpdateContent']);
    
    Route::get('/contribute/chapter/{slug}', [ChapterController::class, 'index']);
    Route::post('/contribute/chapter/{slug}', [ChapterController::class, 'getValidationChaptersImage']);
    Route::get('/contribute/chapter/create/{slug}', [ChapterController::class, 'create']);
    Route::post('/contribute/chapter/create/{slug}', [ChapterController::class, 'getValidationImage']);
    
    Route::post('/contribute/chapter/store/{slug}', [ChapterController::class, 'handleInsertChapter']);
    
    Route::get('/contribute/report', [ReportController::class, 'index']);
    Route::get('/contribute/contract', [ContributeController::class, 'contract']);

    // auth 
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

});





// authectication 
Route::middleware(['guest'])->group(function () {
    
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
});
