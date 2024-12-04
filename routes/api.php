<?php

use App\Http\Controllers\DepositController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApiController;

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

Route::middleware('auth:sanctum')->group(function(){

});

Route::prefix('/v1')->group(function (){
   Route::get('/deposits/confirm/invoice/',[DepositController::class, 'storeDeposit']);
});


Route::post('/login', [ApiController::class, 'login']);
Route::get('/list-strategies', [ApiController::class, 'getAllStrategies']);
Route::get('/spider-web', [ApiController::class, 'spiderWeb']);


