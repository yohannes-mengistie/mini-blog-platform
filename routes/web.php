<?php

use App\Http\Controllers\Auth\{
    LoginController,
    RegisterController,
    ForgotPasswordController,
    ResetPasswordController,
    VerificationController
};

use App\Http\Controllers\Admin\{
    DashboardController,
    UserController
};
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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


//Guest routes

Route::middleware('guest')->group(function() {
    //authentication
    Route::get('register',[RegisterController::class,'show'])->name('register');
    Route::post('register',[RegisterController::class,'store']);


    Route::get('login',[LoginController::class , 'show'])->name('login');
    Route::post('login',[LoginController::class, 'login']);

    // Password reset

    Route::get('forgot-password',[ForgotPasswordController::class,'show'])->name('password.request');
    Route::post('forgot-password',[ForgotPasswordController::class,'sendResetLinkEmail'])->name('password.email');
    Route::get('reset-password/{token}',[ResetPasswordController::class,'showResetForm'])->name('password.reset');
    Route::post('reset-password',[ResetPasswordController::class,'reset'])->name('password.update');

});

// Authenticated routes

Route::middleware('auth')->group(function(){
    //Email verification
    Route::get('email/verify',[VerificationController::class, 'notice'])->name('verification.notice');
    Route::get('email/verify/{id}/{hash}',[VerificationController::class,'verify'])-> middleware('signed')->name('verification.send');


    // Logout

    Route::post('logout' , [LoginController::class,'logout'])->name('logout');
});

// Admin routes

Route::prefix('admin')->name('admin.')->middleware(['auth','verified','role:admin'])->group(function(){
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');

    //user management

    Route::resource('users',UserController::class);

    //Approve writers

    Route::post('user/{user}/approve',[UserController::class,'approve'])->name('users.approve');

});

Route::get('/',function(){
    return view('welcom');
})->name('home');