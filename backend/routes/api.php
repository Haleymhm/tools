<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UnitoperativeController;
use App\Http\Controllers\TypeactivityController;

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


Route::resource('company', CompanyController::class);
Route::put('company', [CompanyController::class,'update']);
Route::delete('company', [CompanyController::class,'destroy']);
Route::post('company/user-by-company', [CompanyController::class,'userByCompany']);



Route::resource('unit-operative', UnitoperativeController::class);
Route::resource('type-activity', TypeactivityController::class);