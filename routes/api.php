<?php

use App\Http\Controllers\HarborController;
use App\Http\Controllers\ShipController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group([
    "prefix" => "harbors",
    "controller" => HarborController::class
], function () {
    Route::get("/", "getAll");
    Route::post("/", "create");
    Route::put("/{harbor}", "update");
    Route::delete("/{harbor}", "delete");
});

Route::group([
    "prefix" => "ships",
    "controller" => ShipController::class
], function () {
    Route::get("/", "getAll");
    Route::post("/", "create");
    Route::put("/{ship}", "update");
    Route::delete("/{ship}", "delete");

    Route::post("/park/{ship}/{harbor}", "parkShip");
});