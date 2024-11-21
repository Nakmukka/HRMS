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
//manage dep
    Route::get('contents/departments/manage-department',function(){
        return view('contents.departments.manage-department');
    })->name('manage-department');
//add department
    Route::get('contents/departments/add-department',function(){
        return view('contents.departments.add-department');
    })->name('add-department');

// Route to display all departments
Route::get('contents/departments', [DepartmentController::class, 'index'])->name('departments.index');

// Route to display the form for creating a new department
Route::get('contents/departments/create', [DepartmentController::class, 'create'])->name('departments.create');

// Route to store a new department
Route::post('contents/departments', [DepartmentController::class, 'store'])->name('departments.store');



require __DIR__.'/admin.php';
