<?php
/** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ClassroomController;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\GradeController;
use App\Http\Controllers\Admin\ParentController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SubjectController;
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

        Route::get('/get-classroom',[TeacherController::class,'getClassrooms'])->name('teachers.getClassroom');
        Route::get('/get-classrooms',[TeacherController::class,'getClassroom'])->name('teachers.classroom');

    });

    Route::group(['prefix'=>'dashboard','namespace' => 'Admin', 'middleware' => 'teacher'], function(){
        /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/

        Route::group(['prefix'=>'classroom-blogs','namespace'=>'Admin'],function (){
            Route::get('/',[BlogController::class,'index'])->name('classroom-blogs');

            Route::get('/edit/{id}',[BlogController::class,'edit'])->name('classroom-blogs.edit');
            Route::post('/update',[BlogController::class,'update'])->name('classroom-blogs.update');
            Route::get('/delete',[BlogController::class,'delete'])->name('classroom-blogs.delete');
        });

    });

    Route::group(['prefix'=>'dashboard','namespace'=>'Admin','middleware'=>'all'],function (){
        Route::get('/', [HomeController::class,'index'])->name('dashboard');

    });

    Route::group(['prefix'=>'dashboard','namespace'=>'Admin','middleware'=>'parent'],function (){
        Route::group(['prefix'=>'students-classroom','namespace'=>'Admin'],function (){
            Route::get('/',[StudentController::class,'index'])->name('students-classroom');
            Route::get('/create',[StudentController::class,'create'])->name('students-classroom.create');
            Route::post('/store',[StudentController::class,'store'])->name('students-classroom.store');
            Route::get('/edit/{id}',[StudentController::class,'edit'])->name('students-classroom.edit');
            Route::post('/update',[StudentController::class,'update'])->name('students-classroom.update');
            Route::get('/delete',[StudentController::class,'delete'])->name('students-classroom.delete');
        });

        Route::group(['prefix'=>'settings-parent','namespace'=>'Admin'],function (){
            Route::get('/',[SettingsController::class,'index'])->name('parents.edit');
            Route::post('/update',[SettingsController::class,'update'])->name('parents.update');
            Route::post('/change-password',[ParentController::class,'changePassword'])->name('parents.changepassword');

        });

    });


    Route::group(['prefix'=>'dashboard','namespace' => 'Admin', 'middleware' => ['teacher']], function(){
        /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
        Route::group(['prefix'=>'teachers','namespace'=>'Admin'],function (){
            Route::get('/',[TeacherController::class,'index'])->name('teachers');
            Route::get('/register-teacher',[TeacherController::class,'create'])->name('teachers.create');
            Route::post('/store',[TeacherController::class,'store'])->name('teachers.store');
            Route::get('/edit',[TeacherController::class,'edit'])->name('teachers.edit');
            Route::get('/update',[TeacherController::class,'update'])->name('teachers.update');
            Route::get('/delete',[TeacherController::class,'delete'])->name('teachers.delete');

        });

    });
    Route::group(['prefix'=>'dashboard','namespace' => 'Admin', 'middleware' => 'auth:admin'], function(){
        Route::get('logout', [AuthController::class,'logOut'])->name('admin.logout');
        Route::get('/create-blog',[BlogController::class,'create'])->name('classroom-blogs.create');
        Route::post('/store',[BlogController::class,'store'])->name('classroom-blogs.store');

        Route::group(['prefix'=>'grades','namespace'=>'Admin'],function (){
            Route::get('/',[GradeController::class,'index'])->name('grades');
            Route::post('/store',[GradeController::class,'store'])->name('grades.store');
            Route::get('/edit',[GradeController::class,'edit'])->name('grades.edit');
            Route::get('/update',[GradeController::class,'update'])->name('grades.update');
            Route::get('/delete',[GradeController::class,'delete'])->name('grades.delete');

        });
        Route::group(['prefix'=>'subjects','namespace'=>'Admin'],function (){
            Route::get('/',[SubjectController::class,'index'])->name('subjects');
            Route::post('/store',[SubjectController::class,'store'])->name('subjects.store');
            Route::get('/edit',[SubjectController::class,'edit'])->name('subjects.edit');
            Route::post('/update',[SubjectController::class,'update'])->name('subjects.update');
            Route::get('/delete',[SubjectController::class,'delete'])->name('subjects.delete');

        });
        Route::group(['prefix'=>'classrooms','namespace'=>'Admin'],function (){
            Route::get('/',[ClassroomController::class,'index'])->name('classrooms');
            Route::post('/store',[ClassroomController::class,'store'])->name('classrooms.store');
            Route::get('/edit',[ClassroomController::class,'edit'])->name('classrooms.edit');
            Route::get('/update',[ClassroomController::class,'update'])->name('classrooms.update');
            Route::get('/delete',[ClassroomController::class,'delete'])->name('classrooms.delete');

        });

        Route::group(['prefix'=>'parents','namespace'=>'Admin'],function (){
            Route::get('/',[ParentController::class,'index'])->name('parents');
            Route::get('/register-parent',[ParentController::class,'create'])->name('parents.create');
            Route::post('/store',[ParentController::class,'store'])->name('parents.store');
            Route::get('/delete',[ParentController::class,'delete'])->name('parents.delete');

        });

        Route::group(['prefix'=>'blogs','namespace'=>'Admin'],function (){
            Route::get('/',[BlogController::class,'indexAll'])->name('blogs');
            Route::get('/register-parent',[BlogController::class,'create'])->name('blogs.create');
            Route::post('/store',[BlogController::class,'store'])->name('blogs.store');
            Route::get('/edit',[BlogController::class,'edit'])->name('blogs.edit');
            Route::get('/update',[BlogController::class,'update'])->name('blogs.update');
            Route::get('/delete',[BlogController::class,'delete'])->name('blogs.delete');

        });

        Route::group(['prefix'=>'students','namespace'=>'Admin'],function (){
            Route::get('/',[StudentController::class,'index'])->name('students');
            Route::get('/create',[StudentController::class,'create'])->name('students.create');
            Route::post('/store',[StudentController::class,'store'])->name('students.store');
            Route::get('/edit/{id}',[StudentController::class,'edit'])->name('students.edit');
            Route::post('/update',[StudentController::class,'update'])->name('students.update');
            Route::get('/delete',[StudentController::class,'delete'])->name('students.delete');
        });
        Route::group(['prefix'=>'exams','namespace'=>'Admin'],function (){
            Route::get('/',[ExamController::class,'index'])->name('exams');
            Route::get('/create',[ExamController::class,'create'])->name('exams.create');
            Route::post('/store',[ExamController::class,'store'])->name('exams.store');
            Route::get('/edit/{id}',[ExamController::class,'edit'])->name('exams.edit');
            Route::post('/update',[ExamController::class,'update'])->name('exams.update');
            Route::get('/delete',[ExamController::class,'delete'])->name('exams.delete');
        });
    });
});

