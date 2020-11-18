<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeacherHaveLessonController;

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

Route::get('/management/users/{id}', [UserController::class, 'show'])
->middleware('isManager')
->name('user.show');

Route::put('/management/users/{id}/editclassroom', [StudentController::class, 'editClassroom'])
->middleware('isManager')
->name('student.editClassroom');

Route::get('/management/teacheroptions', [TeacherController::class, 'indexOptions'])
->middleware('isManager')
->name('teacher.indexOptions');

Route::get('/management/createclassroom', [ClassroomController::class, 'create'])
->middleware('isManager')
->name('classroom.create');

Route::get('/management/classroom/{id}', [ClassroomController::class, 'show'])
->middleware('isManager')
->name('classroom.show');

Route::get('/management/classroombygrade/{grade}', [ClassroomController::class, 'getByGrade'])
->middleware('isManager')
->name('classroom.getByGrade');

Route::post('/management/createclassroom', [ClassroomController::class, 'store'])
->middleware('isManager')
->name('classroom.store');

Route::get('/management/createlesson', [LessonController::class, 'create'])
->middleware('isManager')
->name('lesson.create');

Route::get('/management/lessonoptions', [LessonController::class, 'lessonOptions'])
->middleware('isManager')
->name('lesson.indexOptions');

Route::post('/management/createlesson', [LessonController::class, 'store'])
->middleware('isManager')
->name('lesson.store');

Route::get('/management/attendteacherwithlesson/', 
[TeacherHaveLessonController::class, 'create'])
->middleware('isManager')
->name('thl.create');

Route::post('/management/attendteacherwithlesson/',
[TeacherHaveLessonController::class, 'store'])
->middleware('isManager')
->name('thl.store');

