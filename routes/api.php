<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ChecksController;
use App\Http\Controllers\SessionController;
use App\Models\TimeSlot;
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

Route::post('/register', [AuthController::class, 'register'])->name('api.register');
Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::group(['middleware'=>['auth:sanctum']], function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('api.logout');
    Route::get('/logout/everywhere', [AuthController::class, 'logout_everywhere'])->name('api.logout.everywhere');
    
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [UsersController::class, 'list'])->name('api.users.list');
        Route::get('/{id}', [UsersController::class, 'get'])->name('api.users.get');
        Route::post('/', [UsersController::class, 'create'])->name('api.users.create');
        Route::put('/{id}', [UsersController::class, 'update'])->name('api.users.update');

        Route::get('/{id}/checks/today', [UsersController::class, 'getTodayChecks'])->name('api.users.getTodayChecks');
    });

    Route::group(['prefix' => 'session'], function () {
        Route::get('/lastcheck', [SessionController::class, 'getLastCheck'])->name('api.session.lastcheck');
        Route::get('/checks/today', [SessionController::class, 'getTodayChecks'])->name('api.session.getcheckstoday');
        Route::get('/checks/all', [SessionController::class, 'getTChecks'])->name('api.session.getchecks');
    });

    Route::group(['prefix' => 'check'], function () {
        Route::get('/{action}', [ChecksController::class, 'check'])->name('api.check.check');
    });

    Route::group(['prefix' => 'checks'], function () {
        Route::post('/date', [ChecksController::class, 'userChecksFromDate'])->name('api.checks.user.date');
        Route::get('/recalculate/{id}', [ChecksController::class, 'recalculateSlotTime'])->name('api.checks.recalculate');
    });
});