<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\BannerController;
use App\Http\Controllers\backend\CategoryController;
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::prefix("brand")->group(function () {
    Route::get("index", [BrandController::class,"index"]);
    Route::get("show/{id}", [BrandController::class,"show"]);
    Route::post("store", [BrandController::class,"store"]);
    Route::put("update/{id}", [BrandController::class,"update"]);
    Route::delete("destroy/{id}", [BrandController::class,"delete"]);
});

Route::prefix("banner")->group(function () {
    Route::get("index", [BannerController::class,"index"]);
    Route::get("show/{id}", [BannerController::class,"show"]);
    Route::post("store", [BannerController::class,"store"]);
    Route::post("update/{id}", [BannerController::class,"update"]);
    Route::delete("destroy/{id}", [BannerController::class,"delete"]);

});
Route::prefix("category")->group(function () {
    Route::get("index", [CategoryController::class,"index"]);
    Route::get("show/{id}", [CategoryController::class,"show"]);
    Route::post("store", [CategoryController::class,"store"]);
    Route::post("update/{id}", [CategoryController::class,"update"]);
    Route::delete("destroy/{id}", [CategoryController::class,"delete"]);

});