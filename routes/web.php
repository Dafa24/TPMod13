<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::GET('/', [TaskController::class, 'index'])->name('tasks.index');
Route::POST('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::GET('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::PUT('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');
Route::DELETE('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
 

