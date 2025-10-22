<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
 
Route::apiResource('category', CategoryController::class);

// Route::get('/home', [HomeController::class, 'index']);
// Route::post('/home', [HomeController::class, 'store']);