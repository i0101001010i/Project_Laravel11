<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// Khai báo
use App\Http\Controllers\CategoryController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::get('category', [CategoryController::class, 'index']);

Route::resource('/category', CategoryController::class);
