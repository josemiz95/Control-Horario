<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/register', [AuthController::class, 'register'])->name('api.Register');
Route::post('/login', [AuthController::class, 'login'])->name('api.LogIn');

Route::group(['middleware'=>['auth:sanctum']], function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('api.LogOut');
    Route::get('/logout/everywhere', [AuthController::class, 'logout_everywhere'])->name('api.LogOut_Everywhere');
    
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
