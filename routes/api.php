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
   Route::get('/quant-trade', [ApiController::class, 'getQuantTrades']);
   Route::get('/quant-trade/{quantTrade}', [ApiController::class, 'getQuantTradesShow']);




});

