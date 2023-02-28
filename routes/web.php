<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\SchoolYearsController;
use App\Http\Controllers\SemestersController;
use App\Http\Controllers\SubjectsController;
use App\Http\Controllers\SubjectTeachersController;

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

            Route::get('admin/faculties/faculty-accounts', 'create_faculty')->name('create_faculty');
            Route::post('admin/faculties/store-faculty', 'store_faculty')->name('store_faculty');

        });

        Route::controller(CoursesController::class)->group(function(){
            Route::get('courses', 'index')->name('courses');
            Route::post('course/store', 'store_course')->name('store_course');
            Route::get('/showcourse/{id}','showcourse');
            Route::get('/deletecourse/{id}', 'deletecourse');
            Route::put('/course/delete/{id}', 'deletegradecourse');
            Route::put('/updatecourse/{course}', 'updatecourse');
        });

        Route::controller(SubjectsController::class)->group(function(){
            Route::get('subjects', 'index')->name('subjects');
            Route::post('subject/store', 'store_subject')->name('store_subject');
            Route::get('/showsubject/{id}','showsubject');
            Route::get('/deletesubject/{id}', 'deletesubject');
            Route::put('/subject/delete/{id}', 'deletegradesubject');
            Route::put('/updatesubject/{subject}', 'updatesubject');
        });

        Route::controller(SemestersController::class)->group(function(){
            Route::get('semesters', 'index')->name('semesters');
            Route::post('semester/store', 'store_semester')->name('store_semester');
            Route::get('/showsemester/{id}','showsemester');
            Route::get('/deletesemester/{id}', 'deletesemester');
            Route::put('/semester/delete/{id}', 'deletegradesemester');
            Route::put('/updatesemester/{semester}', 'updatesemester');
        });

        Route::controller(SchoolYearsController::class)->group(function(){
            Route::get('schoolYears', 'index')->name('schoolYears');
            Route::post('schoolyear/store', 'store_schoolYear')->name('store_schoolyear');
            Route::get('/showschoolyear/{id}','showschoolyear');
            Route::get('/deleteschoolyear/{id}', 'deleteschoolyear');
            Route::put('/schoolyear/delete/{id}', 'deletegradeschoolyear');
            Route::put('/updateschoolyear/{schoolyear}', 'updateschoolyear');
        });

        Route::controller(SubjectTeachersController::class)->group(function(){
            Route::get('schedule', 'index')->name('schedule');
            Route::post('subjectteacher/store', 'store_subjectteacher')->name('store_subjectteacher');
            Route::get('/showsubjectteacher/{id}','showsubjectteacher');
            Route::get('/deletesubjectteacher/{id}', 'deletesubjectteacher');
            Route::put('/subjectteacher/delete/{id}', 'deletegradesubjectteacher');
            Route::put('/updatesubjectteacher/{subjectteacher}', 'updatesubjectteacher');
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