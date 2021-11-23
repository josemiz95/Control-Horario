<?php

use App\Http\Controllers\ViewsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/login', function () {
    return view('login');
})->name('login');

/*El token de inicio de sesion se guardara en una cookie por lo cual se podra comprobar si existe la sesion y que usuario esta con la sesion iniciada
para continuar con el uso de la aplicacion*/

Route::group(['middleware'=>['authCookie']], function () {
    Route::get('/prueba', function () {
        dd(Auth::user());
    });

    Route::view('/', 'dashboard')->name('web.dashboard');

    Route::view('/users', 'users.index')->name('web.users');
});