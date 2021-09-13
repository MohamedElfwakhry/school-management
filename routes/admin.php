<?php
/** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\GradeController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function()
{
    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/

    Route::group(['prefix'=>'dashboard','namespace' => 'Admin', 'middleware' => 'guest:admin'], function(){
        /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
        Route::get('login', [AuthController::class,'index'])->name('get.admin.login');
        Route::post('login', [AuthController::class,'login'])->name('admin.login');

    });
    Route::group(['prefix'=>'dashboard','namespace' => 'Admin', 'middleware' => 'auth:admin'], function(){
        Route::get('/', [HomeController::class,'index'])->name('dashboard');
        Route::get('logout', [AuthController::class,'logOut'])->name('admin.logout');

        Route::group(['prefix'=>'grades','namespace'=>'Admin'],function (){
            Route::get('/',[GradeController::class,'index'])->name('grades');
        });
    });
});

