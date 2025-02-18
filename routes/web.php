<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::get('tasks', function () {
    return view('tasks');
});

Route::post('create', function () {
    $name = $_POST['name'];
    DB::table('tasks')->insert(['name' => $name ]);
    return view('tasks');
});
