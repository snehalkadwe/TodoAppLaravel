<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TodoController;
use App\Http\Controllers\TodoListController;

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
Route::get('lists/show/{id}', [TodoListController::class, 'show'])->name('lists.show');
Route::get('lists/edit/{id}', [TodoListController::class, 'edit'])->name('lists.edit');
Route::put('lists/edit/{id}', [TodoListController::class, 'update'])->name('lists.update');
Route::delete('lists/destroy/{id}', [TodoListController::class, 'destroy'])->name('lists.destroy');
// Route::get('/lists/{id}/todo', [TodoListController::class, 'getlisttodos'])->name('lists.todo');
Route::get('/lists/{id}/todos/todo', [TodoListController::class, 'getlisttodos'])->name('todos.todo');


Route::resource('/todos', TodoController::class);