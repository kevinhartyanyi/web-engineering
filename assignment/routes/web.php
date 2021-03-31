<?php

use App\Http\Controllers\SubjectsController;
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

Route::resource('subjects', SubjectsController::class)->middleware(['auth']);

Route::get('subjects', [SubjectsController::class, 'subjects'])->middleware(['auth'])->name('subjects');

Route::get('take', [SubjectsController::class, 'take'])->middleware(['auth'])->name('take');

Route::post('take_subject/{id}', [SubjectsController::class, 'take_subject'])->middleware(['auth'])->name('take_subject');

Route::get('subject_details/{id}', [SubjectsController::class, 'subject_details'])->middleware(['auth'])->name('subject_details');

Route::get('submit_solution/{id}', [SubjectsController::class, 'submit_solution'])->middleware(['auth'])->name('submit_solution');

// Route::get('/subjects', function () {
//     return view('subjects');
// })->middleware(['auth'])->name('subjects');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
