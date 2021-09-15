<?php
/** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ClassroomController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\GradeController;
use App\Http\Controllers\Admin\TeacherController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function()
{
    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/

    Route::group(['prefix'=>'dashboard','namespace' => 'Admin', 'middleware' => 'guest'], function(){
        /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
        Route::get('login', [AuthController::class,'index'])->name('get.admin.login');
        Route::post('login', [AuthController::class,'login'])->name('admin.login');
        Route::get('/error', function (){
            return view('dashboard.permision');
        })->name('permision');


    });

    Route::group(['prefix'=>'dashboard','namespace' => 'Admin', 'middleware' => 'auth:teacher'], function(){
        /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
       /* Route::get('login', [AuthController::class,'index']);
        Route::post('login', [AuthController::class,'login']);*/

    });


    Route::group(['prefix'=>'dashboard','namespace' => 'Admin', 'middleware' => ['teacher']], function(){
        /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
        Route::group(['prefix'=>'teachers','namespace'=>'Admin'],function (){
            Route::get('/',[TeacherController::class,'index'])->name('teachers');
            Route::get('/register-teacher',[TeacherController::class,'create'])->name('teachers.create');
            Route::get('/get-classroom',[TeacherController::class,'getClassrooms'])->name('teachers.getClassroom');
            Route::post('/store',[TeacherController::class,'store'])->name('teachers.store');
            Route::get('/edit',[TeacherController::class,'edit'])->name('teachers.edit');
            Route::get('/update',[TeacherController::class,'update'])->name('teachers.update');
            Route::get('/delete',[TeacherController::class,'delete'])->name('teachers.delete');

        });

    });
    Route::group(['prefix'=>'dashboard','namespace' => 'Admin', 'middleware' => 'auth:admin'], function(){
        Route::get('logout', [AuthController::class,'logOut'])->name('admin.logout');
        Route::get('/', [HomeController::class,'index'])->name('dashboard');

        Route::group(['prefix'=>'grades','namespace'=>'Admin'],function (){
            Route::get('/',[GradeController::class,'index'])->name('grades');
            Route::post('/store',[GradeController::class,'store'])->name('grades.store');
            Route::get('/edit',[GradeController::class,'edit'])->name('grades.edit');
            Route::get('/update',[GradeController::class,'update'])->name('grades.update');
            Route::get('/delete',[GradeController::class,'delete'])->name('grades.delete');

        });
        Route::group(['prefix'=>'classrooms','namespace'=>'Admin'],function (){
            Route::get('/',[ClassroomController::class,'index'])->name('classrooms');
            Route::post('/store',[ClassroomController::class,'store'])->name('classrooms.store');
            Route::get('/edit',[ClassroomController::class,'edit'])->name('classrooms.edit');
            Route::get('/update',[ClassroomController::class,'update'])->name('classrooms.update');
            Route::get('/delete',[ClassroomController::class,'delete'])->name('classrooms.delete');

        });


    });
});

