<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
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


Route::post('user/get-users-list', [UserController::class,'getUsersList']);
Route::post('user/get-user', [UserController::class,'getUser']);
Route::post('user/create-user', [UserController::class,'cretedUser']);
Route::post('user/update-user', [UserController::class,'updateUser']);
Route::post('user/activate-user', [UserController::class,'activateUser']);
Route::post('user/password-user', [UserController::class,'activateUser']);

Route::post('company/create-company', [CompanyController::class,'createCompany']);
Route::post('company/update-company', [CompanyController::class,'updateCompany']);
Route::post('company/user-by-company', [CompanyController::class,'userByCompany']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
