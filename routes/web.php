<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::group(
    [
        'prefix' => 'tasks',
    ],
    function () {
        Route::get('/', [TaskController::class, 'index'])->name('tasks.index');

        Route::post('create', [TaskController::class, 'create'])->name('tasks.create');


        Route::post('delete/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');

        Route::post('edit/{id}', [TaskController::class, 'edit'])->name('tasks.edit');

        Route::post('update', [TaskController::class, 'update'])->name('tasks.update');
    }
);


Route::group(
    [
        'prefix' => 'users',
    ],
    function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');

        Route::post('create', [UserController::class, 'create'])->name('users.create');


        Route::post('delete/{id}', [UserController::class, 'destroy'])->name('users.destroy');

        Route::post('edit/{id}', [UserController::class, 'edit'])->name('users.edit');

        Route::post('update', [UserController::class, 'update'])->name('users.update');
    }
);


Route::get('app', function () {
    return view('layouts.app');
});
