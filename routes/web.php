<?php

use App\Http\Controllers\Frontend\Api\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::group(['middleware' => ['auth', 'isAdmin']], function () {
    Route::prefix('/adm')->group(function () {
        Route::get('/', [HomeController::class, 'index']);

        Route::get('/{admin}', function () {
            return view('Admin.layout.app');
        })->where('admin', '.*');
    });
});


Route::get('/{index}', function () {
    return view('index');
})->where('index', '.*');

