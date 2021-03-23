<?php

use App\Http\Controllers\Admin\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('get_info_users',[UserController::class,'index']);
Route::post('add_user',[UserController::class,'add_user']);
