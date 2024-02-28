<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
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
Route::post('auth/register',[AuthController::class,'register']);
Route::post('auth/login', [AuthController::class, 'login']);


Route::post('users/get-users-list', [UserController::class,'getUsersList']);
Route::post('users/get-user', [UserController::class,'getUser']);
Route::post('users/create-user', [UserController::class,'cretedUser']);
Route::post('users/update-user', [UserController::class,'updateUser']);
Route::post('users/activate-user', [UserController::class,'activateUser']);
Route::post('users/password-user', [UserController::class,'activateUser']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
