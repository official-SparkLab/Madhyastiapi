<?php

use App\Http\Controllers\bioDataController;
use App\Http\Controllers\registration;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [registration::class, 'register']);

Route::get('/getRegisterData', [registration::class, 'fetchRegisteredData']);

Route::post('/login', [registration::class, 'login']);

Route::get('/getRegisterData/{user_type}', [registration::class, 'fetchByUserType']);

Route::post('/addBioData', [bioDataController::class, 'addBioData']);

Route::get('/getBioData', [bioDataController::class, 'fetchBioData']);
