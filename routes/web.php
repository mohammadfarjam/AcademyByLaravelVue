<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;

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
