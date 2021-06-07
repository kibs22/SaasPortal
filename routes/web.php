<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuickbooksController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\SubscriptionController;
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


Route::resource('/',QuickbooksController::class)->only(['index', 'show']);
Route::resource('login',LoginController::class)->only(['index', 'show']);


Route::resource('QB',QuickbooksController::class, ['id' => 'users']);

Route::resource('register',RegisterController::class)->only(['index','show']);

Route::resource('register',RegisterController::class);

Route::resource('subscription',SubscriptionController::class);

Route::resource('transaction',TransactionController::class);

Route::resource('login',LoginController::class);

Route::get('/logout',[LoginController::class,'logout']);
