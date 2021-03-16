<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
Auth::routes();


Route::get('/', function () {
    return view('index');
});


Route::prefix('/manager')->group(function () {
    Route::get('/', [HomeController::class, 'index']);
});



Route::get('/{any}', function () {
    return view('index');
})->where('any','.*');


Route::get('/manager/{any}', function () {
    return view('Admin.index');
})->where('any','.*');


