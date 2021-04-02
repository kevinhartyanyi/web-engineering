<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TasksController;
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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

//Route::resource('subjects', StudentController::class)->middleware(['auth']);
Route::resource('subjects', TeacherController::class)->middleware(['auth']);
Route::resource('tasks', TasksController::class)->middleware(['auth']);

Route::post('save_task/{id}', [TasksController::class, 'save_task'])->middleware(['auth'])->name('save_task');
Route::get('create_task/{id}', [TasksController::class, 'create_task'])->middleware(['auth'])->name('create_task');
Route::get('task_solution/{id}', [TasksController::class, 'task_solution'])->middleware(['auth'])->name('task_solution');
Route::post('evaluate_solution/{id}', [TasksController::class, 'evaluate_solution'])->middleware(['auth'])->name('evaluate_solution');

Route::get('subjects', [StudentController::class, 'subjects'])->middleware(['auth'])->name('subjects');

Route::get('take', [StudentController::class, 'take'])->middleware(['auth'])->name('take');

Route::post('take_subject/{id}', [StudentController::class, 'take_subject'])->middleware(['auth'])->name('take_subject');

Route::get('subject_details/{id}', [StudentController::class, 'subject_details'])->middleware(['auth'])->name('subject_details');

Route::get('submit_solution/{id}', [StudentController::class, 'submit_solution'])->middleware(['auth'])->name('submit_solution');

Route::post('save_solution/{id}', [StudentController::class, 'save_solution'])->middleware(['auth'])->name('save_solution');

Route::post('subject_remove/{id}', [StudentController::class, 'subject_remove'])->middleware(['auth'])->name('subject_remove');

Route::get('subjects.create', [StudentController::class, 'create_subject'])->middleware(['auth'])->name('create_subject');

// Route::get('/subjects', function () {
//     return view('subjects');
// })->middleware(['auth'])->name('subjects');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
