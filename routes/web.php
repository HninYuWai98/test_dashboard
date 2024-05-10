<?php

use App\Models\Student\Student;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\CourseController;
use App\Http\Controllers\Web\StudentController;
use App\Http\Controllers\Web\CustomerController;
use App\Http\Controllers\Web\CourseStudentController;
use App\Http\Controllers\Web\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::resource('students', StudentController::class)->names('students');
Route::resource('courses', CourseController::class)->names('courses')->except('show');

Route::resource('customers', CustomerController::class)->names('customers')->except('show');

Route::resource('orders', OrderController::class)->names('orders')->except('show','edit','update','delete');

});

require __DIR__.'/auth.php';



