<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\LessonController;

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
    return view('school.home');
});

Route::get('/management', [ManagerController::class, 'home']);

Route::get('/management/createuser', [UserController::class, 'create'])
->middleware('isManager')
->name('user.create');

Route::get('/management/users', [UserController::class, 'index'])
->middleware('isManager')
->name('user.index');

Route::get('/management/createclassroom', [ClassroomController::class, 'create'])
->middleware('isManager')
->name('classroom.create');

Route::post('/management/createclassroom', [ClassroomController::class, 'store'])
->middleware('isManager')
->name('classroom.store');

Route::get('/management/createlesson', [LessonController::class, 'create'])
->middleware('isManager')
->name('lesson.create');

Route::post('/management/createlesson', [LessonController::class, 'store'])
->middleware('isManager')
->name('lesson.store');

