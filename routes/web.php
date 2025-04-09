<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\homeController;
use App\Models\Department;
use Illuminate\Support\Facades\Route;

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

Route::get("/",function (){
    return view('user.index');
})->name('user.home');

Route::middleware('IsLogin')->group(function(){
    Route::get("/courses",function (){
        return view('user.courses');
    })->name('user.courses');
    Route::get('logout',[AuthController::class,'logout'])->name('auth.logout');
});

Route::middleware('IsAdminLogin')->group(function(){
    Route::prefix('admin')->group(function(){
        Route::get('/',[homeController::class,'index'])->name('admin.home');
        Route::get('students/archive',[StudentController::class,'archive'])->name('students.archive');
        Route::get('students/{student}/restore',[StudentController::class,'restore'])->name('students.restore');
        Route::delete('students/{student}/destroy',[StudentController::class,'forceDestroy'])->name('students.forceDestroy');
        Route::resource('students',StudentController::class);
        Route::resource('departments',DepartmentController::class);
    });
});

Route::get('register',[AuthController::class,'register'])->name('auth.register');
Route::post('registerHandle',[AuthController::class,'registerHandle'])->name('auth.registerHandle');
Route::get('login',[AuthController::class,'login'])->name('auth.login');
Route::post('loginHandle',[AuthController::class,'loginHandle'])->name('auth.loginHandle');