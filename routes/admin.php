<?php
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware("auth: admin")->group (function () {

Route::get('/dashboard', function () { 
    return view('admin.dashboard');

})->name('admin.dashboard');

Route::post('logout',[LoginController::class, 'destroy'])->name('admin.logout');

});