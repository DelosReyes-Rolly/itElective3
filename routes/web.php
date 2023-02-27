<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\LandingController;

/*
|--------------------------------------------------------------------------
| Landing Page Routes
|--------------------------------------------------------------------------
|
| Documentation
| 
| 
|
*/

Route::controller(LandingController::class)->group(function(){
    Route::get('/', 'landing');
});


 /*
|--------------------------------------------------------------------------
| Preventing to view pages in account after logout
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'prevent-back-history'],function(){

    /*
    |--------------------------------------------------------------------------
    | Admin Routes
    |--------------------------------------------------------------------------
    |
    | Documentation
    | 
    | 
    |
    */
    Route::group(['middleware' => 'is_admin'], function () {

        Route::controller(AdminController::class)->group(function(){

            Route::get('admin/home', 'adminHome')->name('admin.home');
            Route::get('admin/profile', 'profile')->name('admin.profile');
        });
    });






    /*
    |--------------------------------------------------------------------------
    | Faculty Routes
    |--------------------------------------------------------------------------
    |
    | Documentation
    | 
    | 
    |
    */
    Route::group(['middleware' => 'is_faculty'], function () {

        Route::controller(FacultyController::class)->group(function(){

            Route::get('/home', 'index')->name('home');
            Route::get('faculty/profile', 'profile')->name('faculty.profile');

        });
    });

});

Auth::routes();