<?php

use App\Http\Controllers\DepositController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApiController;
use Illuminate\Session\Middleware\StartSession;

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


Route::prefix('/v1')->group(function (){
   Route::get('/deposits/confirm/invoice/',[DepositController::class, 'storeDeposit']);
});




Route::post('/login', [ApiController::class, 'login']);
Route::get('/list-strategies', [ApiController::class, 'getAllStrategies']);
Route::middleware(['auth:sanctum', StartSession::class])->group(function () {
   Route::get('/spider-web', [ApiController::class, 'spiderWeb']);
   Route::post('/buy-spider-web', [ApiController::class, 'spiderWebBuy']);
   Route::get('/setup-2fa', [ApiController::class, 'setup2fa']);
   Route::post('/setup-2fa', [ApiController::class, 'update2fa']);
   Route::get('/quant-trade', [ApiController::class, 'getQuantTrades']);
   Route::get('/quant-trade/{quantTrade}', [ApiController::class, 'getQuantTradesShow']);
   Route::get('/my-strategies', [ApiController::class, 'getUserStrategies'])->name('api.my-strategies');
   Route::get('/my-strategy/{strategyId}', [ApiController::class, 'getStrategyDetails'])->name('api.strategy.show');
   Route::get('/exchange', [ApiController::class, 'getExchangeData']);
   Route::get('/user-menu', [ApiController::class, 'getUserMenuData']);
   Route::get('/wallet', [ApiController::class, 'getWallet']);
   Route::get('/profile', [ApiController::class, 'getProfile']);
   Route::post('/profile', [ApiController::class, 'updateProfile']);
   Route::post('/update-payment-password', [ApiController::class, 'updatePaymentPassword']);
   Route::post('/update-current-password', [ApiController::class, 'updatePassword']);
   Route::get('/invite', [ApiController::class, 'invite']);
   Route::get('/crypto-list', [ApiController::class, 'getCryptoList']);
   Route::get('/my-team', [ApiController::class, 'getMyTeam']);
   Route::get('/claim-commission/{team}', [ApiController::class, 'claimCommission']);
   Route::get('/deposit', [ApiController::class, 'depositIndex']);
   Route::post('/deposit/add', [ApiController::class, 'depositAdd']);
   Route::get('/transfer', [ApiController::class, 'transfer']);
   Route::post('/transfer-user', [ApiController::class, 'transferUser']);







});

