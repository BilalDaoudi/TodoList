<?php
use App\Http\Controllers\TodoListController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});
// Auth routes
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
// Registration routes
Route::get('/register', [UserController::class, 'showInscriptionForm'])->name('register.form');
Route::post('/register', [UserController::class, 'register'])->name('register');
// Todo list routes
Route::prefix('todolist')->group(function () {
    Route::get('{date?}', [TodoListController::class, 'index'])->name('todolist');
    Route::post('/', [TodoListController::class, 'store'])->name('todolist.store');
    Route::delete('{id}', [TodoListController::class, 'delete'])->name('todolist.delete');
    Route::put('valider/{id}', [TodoListController::class, 'valider'])->name('todolist.valider');
    Route::put('play/{id}', [TodoListController::class, 'play'])->name('todolist.play');
});
