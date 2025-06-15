<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index'])->name('home');

//middleware
Route::group(['prefix' => 'account'], function(){
    
    //Guest routes
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/register', [AccountController::class, 'registration'])->name('account.registration');
        Route::post('/process-register', [AccountController::class, 'processRegistration'])->name('account.processRegistration');
        Route::get('/login', [AccountController::class, 'login'])->name('account.login');
        Route::post('/authenticate', [AccountController::class, 'authenticate'])->name('account.authenticate');
    });

    //Authenticate routes                                                       
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/profile', [AccountController::class, 'profile'])->name('account.profile');
                
        Route::put('/update-profile', [AccountController::class, 'updateProfile'])->name('account.updateProfile');
        
        // logout is not working in here
    });
    
    Route::get('/logout', [AccountController::class, 'logout'])->name('account.logout');

});