<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartmentController;

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
    return view('index');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//departments


// Route to display all departments
Route::get('contents/departments', [DepartmentController::class, 'index'])->name('departments.index');

// Route to display the form for creating a new department
Route::get('contents/departments/create', [DepartmentController::class, 'create'])->name('departments.create');

// Route to store a new department
Route::post('contents/departments', [DepartmentController::class, 'store'])->name('departments.store');

// Route to display the form for editing an existing department
Route::get('/departments/{id}/edit', [DepartmentController::class, 'edit'])->name('departments.edit');

// Route to update an existing department
Route::put('/departments/{id}', [DepartmentController::class, 'update'])->name('departments.update');

// Route to delete a department
Route::delete('contents/departments/{id}', [DepartmentController::class, 'destroy'])->name('departments.destroy');


require __DIR__.'/admin.php';
