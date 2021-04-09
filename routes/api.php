<?php

use App\Http\Controllers\Admin\Api\PostController;
use App\Http\Controllers\Admin\Api\UploadPhotoController;
use App\Http\Controllers\Admin\Api\UserController;
use App\Http\Controllers\Frontend\Api\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('get_info_users',[UserController::class,'index']);
Route::get('get_roles',[UserController::class,'get_roles']);
Route::post('add_user',[UserController::class,'add_user']);
Route::post('upload_photos',[UploadPhotoController::class,'upload_photos']);
Route::apiResource('post',PostController::class);



// Frontend
Route::get('/get_new_products',[HomeController::class,'get_new_products']);
Route::get('/details_products/{slug}',[HomeController::class,'details_products']);
