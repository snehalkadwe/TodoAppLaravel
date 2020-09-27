<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TodoController;
use App\Http\Controllers\TodoListController;
use App\Http\Controllers\TaskController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('lists', [TodoListController::class, 'index']);
Route::get('/lists/create', [TodoListController::class, 'create'])->name('lists.create');
Route::post('lists', [TodoListController::class, 'store'])->name('lists.store');
Route::get('lists/show/{todolist}', [TodoListController::class, 'show'])->name('lists.show');
Route::get('lists/edit/{todolist}', [TodoListController::class, 'edit'])->name('lists.edit');
Route::put('lists/edit/{todolist}', [TodoListController::class, 'update'])->name('lists.update');
Route::delete('lists/destroy/{todolist}', [TodoListController::class, 'destroy'])->name('lists.destroy');
// Route::get('/lists/{id}/todo', [TodoListController::class, 'getlisttodos'])->name('lists.todo');
Route::get('/lists/{id}/todos/todo', [TodoListController::class, 'getlisttodos'])->name('todos.todo');
Route::get('/lists/selectd', [TodoListController::class, 'getdropdownlist'])->name('lists.selectd');


Route::resource('/todos', TodoController::class);
Route::put('todos/{todo}/complete', [TodoController::class, 'complete'])->name('todos.complete');
 Route::delete('todos/{todo}/incomplete', [TodoController::class, 'incomplete'])->name('todos.incomplete');

Route::get('tasks', [TaskController::class, 'index'])->name('tasks');
Route::post('tasks', [TaskController::class, 'store'])->name('tasks');
// Route::post('tasks', [TaskController::class, 'complete'])->name('tasks.complete');
 Route::put('tasks/{id}/complete', [TaskController::class, 'complete'])->name('tasks.complete');
 Route::delete('tasks/{id}/incomplete', [TaskController::class, 'incomplete'])->name('tasks.incomplete');


// Route::get('tasks/{id}/complete' , [TaskController::class, 'complete'])->name('tasks');