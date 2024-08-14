<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\PruebaApiController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('students', StudentController::class);
Route::resource('courses', CourseController::class);
Route::resource('subjects', SubjectController::class);
Route::resource('grades', GradeController::class);
Route::get('api/prueba',[PruebaApiController::class, 'index']);
