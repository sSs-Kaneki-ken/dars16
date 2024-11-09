<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentController;
use App\Http\Middleware\Check;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.main'); 
});

Route::get('/student', [StudentController::class , 'index']);
Route::delete('/student/{student}' , [StudentController::class, 'destroy'])->name('student.destroy');





Route::get('/post' , [PostController::class , 'index']);
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');


Route::get('/loginpage' , [AuthController::class , 'loginPage'])->name('loginPage');
Route::post('/login' , [AuthController::class , 'login'])->name('login');


Route::get('/registerpage' , [AuthController::class , 'registerPage'])->name('registerPage');
Route::post('/register' , [AuthController::class , 'register'])->name('register');

Route::get('/users', [RoleController::class , 'index'])->name('users.index');
Route::delete('/users/{user}', [RoleController::class , 'destroy'])->name('role.destroy')->middleware(Check::class. ':delete');
Route::get('/role/create', [RoleController::class, 'create'])->name('role.create')->middleware(Check::class . ':create');
Route::post('/role', [RoleController::class, 'store'])->name('role.store');
Route::get('/role/{id}/edit', [RoleController::class, 'edit'])->name('role.edit')->middleware(Check::class . ':update');
Route::put('/role/{id}', [RoleController::class, 'update'])->name('role.update');
Route::get('/logout' , [AuthController::class , 'logout']);