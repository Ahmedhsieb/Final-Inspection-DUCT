<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/submit-signature', [\App\Http\Controllers\TestController::class, 'submitSignature']);
Route::resource('task', TaskController::class);
