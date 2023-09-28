<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserController;
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


Route::post('company/company-update', [CompanyController::class,'updateCompany']);
Route::post('company/user-by-company', [CompanyController::class,'userByCompany']);
Route::post('company/get-data', [CompanyController::class,'showData']);

Route::post('users/get-users-list', [UserController::class,'getUsersList']);
Route::post('users/get-user', [UserController::class,'getUser']);
Route::post('users/create-user', [UserController::class,'cretedUser']);
Route::post('users/update-user', [UserController::class,'updateUser']);
Route::post('users/activate-user', [UserController::class,'activateUser']);
Route::post('users/password-user', [UserController::class,'activateUser']);


Route::resource('unit-operative', UnitoperativeController::class);
Route::resource('type-activity', TypeactivityController::class);