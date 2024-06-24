<?php

use App\Http\Controllers\RemindersController;
use Illuminate\Http\Request;
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

Route::get('reminders',                 [RemindersController::class, 'index']);
Route::post('reminders',                [RemindersController::class, 'store']);
Route::post('reminders/{note}',         [RemindersController::class, 'update']);
Route::get('reminders/{note}',          [RemindersController::class, 'show']);
Route::delete('reminders/{note}',       [RemindersController::class, 'destroy']);