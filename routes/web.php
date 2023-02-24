<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'is_admin'], function () {
    Route::controller(HomeController::class)->group(function(){
        Route::get('admin/home', 'adminHome')->name('admin.home');
    });

    Route::controller(AdminController::class)->group(function(){
        Route::get('admin/profile', 'profile')->name('admin.profile');
    });
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('faculty/profile', [App\Http\Controllers\FacultyController::class, 'profile'])->name('faculty.profile');