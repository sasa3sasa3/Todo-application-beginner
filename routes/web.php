<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\CategoryController;

Route::get('/todos', [TodoController::class, 'index'])->name('todos.index');

Route::post('/todos', [TodoController::class, 'store'])->name('todos.store');

Route::patch('/todos/{todo}', [TodoController::class, 'update'])->name('todos.update');

Route::delete('/todos/{todo}', [TodoController::class, 'destroy'])->name('todos.destroy');

Route::get('/todos/search', [TodoController::class, 'search'])->name('todos.search');

//Category routes
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

Route::patch('/categories/update', [CategoryController::class, 'update'])->name('categories.update');

Route::delete('/categories/delete', [CategoryController::class, 'destroy'])->name('categories.destroy');