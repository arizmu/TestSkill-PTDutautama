<?php

use App\Http\Controllers\ApiLoginController;
use App\Http\Controllers\TransactionController;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\returnSelf;

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
    return response()->json($request->user());
});

Route::post('/login', [ApiLoginController::class, 'login']);
Route::get('/me', [ApiLoginController::class, 'me'])->middleware('auth:sanctum');

Route::group([
    'prefix' => 'v1'
], function() {
    Route::post('/transaction', [TransactionController::class, 'api_store']);
});
