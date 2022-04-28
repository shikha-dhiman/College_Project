<?php

use App\Http\Controllers\CategoryApiController;
use App\Http\Controllers\Auth\UserApiController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
		'namespace'=>'Auth',
	], function(){
		Route::post('register',[UserApiController::class, 'register']);
		Route::post('login', [UserApiController::class, 'login']);
		Route::post('forgotPassword', [UserApiController::class, 'forgotPassword']);
	});

Route::get('list',[CategoryApiController::class, 'index']);
Route::Post('add',[CategoryApiController::class, 'add']);
Route::Post('edit',[CategoryApiController::class, 'edit']);
Route::delete('delete',[CategoryApiController::class, 'delete']);

