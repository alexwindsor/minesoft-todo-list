<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TodoListController;
use App\Http\Controllers\TodoController;


// Route::get('/', function () {
//     return Inertia::render('Home', [
//         'user' => auth()->user()
//     ]);
// })->middleware('auth');

// Route::get('/', function () {
//     return auth()->user()->id();
// });

Route::get('/', [TodoListController::class, 'index'])->middleware('auth');
Route::post('/getTodoLists', [TodoListController::class, 'getTodoLists'])->middleware('auth');
Route::post('/getTodos', [TodoController::class, 'getTodos'])->middleware('auth');
Route::post('/addTodo', [TodoController::class, 'store'])->middleware('auth');
Route::post('/addList', [TodoListController::class, 'store'])->middleware('auth');
Route::put('/editList', [TodoListController::class, 'update'])->middleware('auth');
Route::delete('/deleteList/{id}', [TodoListController::class, 'destroy'])->middleware('auth');
Route::put('/changeTodoCompleted', [TodoController::class, 'changeTodoCompleted'])->middleware('auth');
Route::delete('/deleteTodo/{id}', [TodoController::class, 'destroy'])->middleware('auth');
Route::put('/editTodo', [TodoController::class, 'update'])->middleware('auth');



// auth
Route::get('/login', function () {
    return Inertia::render('Auth/Login');
})->middleware('guest')->name('login');

Route::post('/login', [UserController::class, 'login'])->middleware('guest');

Route::get('/logout', function () {
    return Inertia::render('Auth/Logout', [
        'user' => auth()->user()
    ]);
})->middleware('auth')->name('logout');

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/register', function () {
    return Inertia::render('Auth/Register');
})->middleware('guest')->name('register');

Route::post('/register', [UserController::class, 'store'])->middleware('guest');

Route::get('/edit_profile', function () {
    return Inertia::render('Auth/EditProfile', [
        'user' => auth()->user()
    ]);
})->middleware('auth')->name('edit_profile');

Route::put('/update_profile', [UserController::class, 'update'])->middleware('auth');

Route::put('/delete_account', [UserController::class, 'destroy'])->middleware('auth'); // delete would be better method here but inertia doesn't send data using router.delete unfortunately - hopefully they will fix this in a newer version