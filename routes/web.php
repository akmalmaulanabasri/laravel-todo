<?php

use App\Http\Controllers\TodoController;
use GuzzleHttp\Middleware;
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


Route::middleware('isGuest')->group(function(){
    Route::get('/', [TodoController::class, 'index'])->name('home');
    Route::get('/login', [TodoController::class, 'login'])->name('login')->middleware('guest');
    Route::post('/login', [TodoController::class, 'loginS'])->middleware('guest');
    Route::get('/register', [TodoController::class, 'register'])->middleware('guest');
    Route::post('/register', [TodoController::class, 'store'])->middleware('guest');
});

Route::get('/logout', [TodoController::class, 'logout'])->name('logout');

Route::middleware('isLogin')->group(function(){
    Route::get('/dashboard', [TodoController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard/completed', [TodoController::class, 'completed'])->name('completed');
    Route::get('/dashboard/todo/edit/{id}', [TodoController::class, 'edit'])->name('todo-edit');
    Route::get('/dashboard/add', [TodoController::class, 'createTodo'])->name('add');
    Route::post('/dashboard/todo/update/{id}', [TodoController::class, 'UpdateTodo'])->name('UpdateTodo');
    Route::post('/dashboard/add/posts', [TodoController::class, 'addTodo'])->name('addTodo');
    Route::get('/dashboard/todo/complete/{id}', [TodoController::class, 'todoComplete'])->name('todoComplete');  
    Route::get('/dashboard/todo/delete/{id}', [TodoController::class, 'todoDelete'])->name('todoDelete');  
});