<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\{
    UsersController,
    CountryController,
    EmailVerificationCodeController,
};
use App\Http\Controllers\Auth\AuthController;


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


Route::middleware(['json.response', 'guest'])->prefix('/authentication')->group( function ()
{
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/reset-password', [AuthController::class, 'resetPassword']);
    Route::post('/check-user-token', [AuthController::class, 'checkUserToken']);
    Route::post('/update-your-self', [AuthController::class, 'updateYourself']);

    Route::post('/email-verification', [EmailVerificationCodeController::class, 'sendEmailVerification']);
    Route::post('/check-email-verification', [EmailVerificationCodeController::class, 'checkEmailVerification']);
});

Route::apiResource('/application/users', UsersController::class);



Route::middleware(['json.response', 'auth:api', 'auth.permission'])->prefix('/application')->group( function ()
{
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('/countries', CountryController::class);
});
