<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MainController;



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

//Auth Routes
Route::post('signup', [AuthController::class, 'signup']);
Route::post('login', [AuthController::class, 'login']);
Route::get('forgot-password/{email}', [AuthController::class, 'forgot_password']);
Route::post('reset-password', [AuthController::class, 'reset_password']);
Route::post('login-with-facebook', [AuthController::class, 'login_with_facebook']);
Route::post('login-with-google', [AuthController::class, 'login_with_google']);
Route::get('logout/{user_id}', [AuthController::class, 'logout']);
Route::post('edit-profile', [AuthController::class, 'edit_profile']);
Route::post('change-password', [AuthController::class, 'change_password']);
Route::get('delete-account/{user_id}', [AuthController::class, 'delete_account']);

//App Routes
Route::get('team-members/{referral_code}', [MainController::class, 'team_members']);
