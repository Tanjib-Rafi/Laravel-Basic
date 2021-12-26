<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UploadController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('about', function () {
    return view('about');
});

// Route::get('dashboard2', function () {
//     return view('admin.pages.dashboard');
// });
// Route::get('tables', function () {
//     return view('admin.pages.tables');
// });


Route::get('/show',[EmployeeController::class,'show']);
Route::get('/insert',[EmployeeController::class,'insert']);
Route::post('/store',[EmployeeController::class,'store']);
Route::get('edit/{id}',[EmployeeController::class,'edit']);
Route::post('update/{id}',[EmployeeController::class,'update']);
Route::get('delete/{id}',[EmployeeController::class,'delete']);


Route::get('/login',[AuthController::class,'login']);
Route::post('/loginstore',[AuthController::class,'loginstore']);

Route::middleware(['checkloggedin', 'checkIfStudent'])->group(function () {
    Route::get('student', [AuthController::class, 'studentdashboard']);
    // Route::get('about', [AuthController::class, 'about']);
    // Route::get('resume', [AuthController::class, 'resume']);
    // Route::get('services', [AuthController::class, 'services']);
    // Route::get('portfolio', [AuthController::class, 'portfolio']);
    // Route::get('contact', [AuthController::class, 'contact']);
    // Route::post('update/{id}', [EmployeeController::class, 'update']);
    // Route::get('delete/{id}', [EmployeeController::class, 'delete']);
});
Route::middleware(['checkloggedin', 'checkIfTeacher'])->group(function () {
    Route::get('teacher', [AuthController::class, 'teacherdashboard']);
    
    Route::get('tables', [AuthController::class, 'tables']);
    Route::get('upload', [UploadController::class, 'upload']);
    Route::post('upload-image', [UploadController::class, 'uploadImage']);
});

Route::get('logout', [AuthController::class, 'logout']);

//image routes
Route::get('upload', [UploadController::class, 'upload']);
Route::post('upload-image', [UploadController::class, 'uploadimage']);