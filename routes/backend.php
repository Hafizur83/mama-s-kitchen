<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\CatagoryController;
use App\Http\Controllers\Admin\FoodController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\AppSettingController;
use App\Http\Controllers\Admin\SettingController;
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware(['auth','admin'])->group(function () {
    
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::resource('/catagory', CatagoryController::class);
    Route::resource('/fooditems', FoodController::class);
    Route::post('/fooditems/delete/{id}', [FoodController::class, 'delete'])->name('fooditems.delete');
    Route::resource('/slider', SliderController::class);
    Route::resource('/contact', ContactController::class);
    Route::resource('/reservation', ReservationController::class);
    Route::resource('/appsetting', AppSettingController::class);

#  User Profile
    Route::get('/profile', [ProfileController::class, 'profile']);
    Route::put('/profile/update', [ProfileController::class, 'profile_update'])->name('profile.update');
    Route::get('/profile/reset', [ProfileController::class, 'reset']);
    Route::put('/profile/password-change', [ProfileController::class, 'passwordchange'])->name('change.password');

# Mail Setting
    Route::get('/setting/mail', [SettingController::class, 'mail_setting']);
    Route::put('/mailupdate', [SettingController::class, 'mailsetting'])->name('mail.update');
    Route::resource('/setting', SettingController::class);



 
    
});

Auth::routes();

