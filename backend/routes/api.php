<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TbbarangController;



// auth routes

Route::post("/auth/signin", [AuthController::class , 'SignInHandler']);
Route::post("/auth/signup" , [AuthController::class, 'SignUpHandler']);

//tbbarang routes

Route::get("/product/barang/all", [TbbarangController::class,  'GetAllBarang']);
Route::post("/product/barang/create" , [TbbarangController::class, 'CreateBarang']);
Route::delete("/product/barang/delete/{kodebarang}" , [TbbarangController::class, 'DeleteBarang']);
Route::patch('/product/barang/update/{kodebarang}', [TbbarangController::class , 'UpdateBarang']);