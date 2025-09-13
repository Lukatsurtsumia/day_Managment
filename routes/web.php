<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\UserController;
use App\Models\Task;
use App\Models\User;
 
Route::get('/', function () {
    $tasks = Task::all();
    $customers = User::all();
    return view('welcome' , compact('tasks', 'customers'));
})->name('home');

Route::get('/registration', function(){
    return view('auth.registration');
})->name('registration.form');
Route::post('/registration', [UserController::class, 'register'])->name('registration');

Route::get('/login', [UserController::class , 'showloginform'])->name('login');
Route::post('login', [UserController::class, 'login'])->name('logged-in');

Route::post('/logout', [UserController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function(){
   
 Route::get('/tasks', [TaskController::class, 'index'])->name('tasks') ;
 Route::post('tasks', [TaskController::class, 'create'])->name('tasks.store');
 
Route::patch('tasks/{task}/done', [TaskController::class, 'markAsDone'])->name('tasks.done');
Route::delete('tasks/{task}', [TaskController::class, 'deleteTask'])->name('deleteTask');

Route::delete('user/{user}', [UserController::class, 'deleteUser'])->name('deleteUser');
});

