<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//


//API
Route::get('/v1/notebook/',[\App\Http\Controllers\NotebookController::class,'index']);
Route::post('/v1/notebook/',[\App\Http\Controllers\NotebookController::class,'store']);
Route::get('/v1/notebook/{id}',[\App\Http\Controllers\NotebookController::class,'show']);
Route::patch('/v1/notebook/{id}',[\App\Http\Controllers\NotebookController::class,'update']);
Route::delete('/v1/notebook/{id}',[\App\Http\Controllers\NotebookController::class,'destroy']);
//


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
