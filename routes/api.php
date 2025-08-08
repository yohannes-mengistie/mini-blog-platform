<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\Api\{
    RegisterController,
    ConfirmPasswordController,
    LoginController,
    ForgotPasswordController,
    ResetPasswordController,
    EmailVerificationController

};

use App\Http\Controllers\Blog\Api\{
    BlogController,
};
use Mockery\VerificationDirector;

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


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('guest')->group(function(){
    Route::post('/register' , [RegisterController::class,'store']);
    Route::post('/login' , [LoginController::class,'login']);


    Route::post('forgot-password',[ForgotPasswordController::class,'sendResetLinkEmail'])->name('password.email');
    Route::get('reset-password/{token}',[ResetPasswordController::class,'showResetForm'])->name('password.reset');
    Route::post('reset-password',[ResetPasswordController::class,'reset'])->name('password.update');

});


// Authenticated routes
Route::get('/email/verify/{id}/{hash}',[EmailVerificationController::class,'verify'])->middleware(['signed'])->name('verification.verify');
Route::middleware('auth:sanctum')->group(function(){
    Route::get('/email/verify',[EmailVerificationController::class,'notice'])->name('verification.notice');
    Route::post('/email/verification-notification',[EmailVerificationController::class ,'send'])->middleware(['throttle:6,1'])->name('verification.send');

    // password confirmition

    Route::get('confirm-password',[ConfirmPasswordController::class,'showConfirmForm'])->name('password.confirm');
    Route::post('confirm-password',[ConfirmPasswordController::class,'confirm'])->name('password.confirm.submit');


    // Logout

    Route::post('logout' , [LoginController::class,'logout'])->name('logout');
});


// Blog routes
// Route::middleware('auth:sanctum')->group(function(){
//     Route::resource('blogs', BlogController::class)->except(['edit']);
// });
Route::get('/blogs/index',[BlogController::class,'index'])->middleware('auth:sanctum');

Route::middleware(['auth:sanctum','can:editblog,blog'])->group(function(){
    Route::get('blogs/{blog}/edit' , [BlogController::class,'edit'])->name('blogs.edit');
});

Route::middleware(['auth:sanctum','role:writer'])->group(function(){
    Route::get('blogs/create',[BlogController::class,'create'])->name('blogs.create');
});

