<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoyaltyWalletController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\RedeemController;
use App\Http\Controllers\RewardController;
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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/loyalty-wallet', LoyaltyWalletController::class);
    Route::get('/purchases', PurchaseController::class);
    Route::get('/rewards', RewardController::class);
    Route::get('/rewards/redeem', RedeemController::class);
    Route::get('/profile', ProfileController::class);

});
