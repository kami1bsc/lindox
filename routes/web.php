<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Admin\NavigationController;
// use App\Http\Controllers\Provider\NavigationController;
// use App\Http\Controllers\User\NavigationController;
use App\Http\Controllers\Admin\AllUsersController;
use App\Http\Controllers\Admin\RideTypeController;
use App\Http\Controllers\Admin\RidePostController;
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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('admin-logout', function(){
	\Auth::logout();

	return view('welcome');
})->name('admin-logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([ 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'CheckUserRole']], function() {
    Route::get('/', [App\Http\Controllers\Admin\NavigationController::class, 'dashboard'])->name('dashboard');
	Route::get('/passenger', [App\Http\Controllers\Admin\AllUsersController::class,'indexpassenger'])->name('passenger');	
	Route::resource('/users',  App\Http\Controllers\Admin\AllUsersController::class);	
});

Route::group([ 'prefix' => 'user', 'as' => 'user.', 'middleware' => ['auth', 'CheckUserRole']], function() {
    Route::get('/', [App\Http\Controllers\User\NavigationController::class, 'dashboard'])->name('dashboard');
});

Route::group([ 'prefix' => 'provider', 'as' => 'provider.', 'middleware' => ['auth', 'CheckUserRole']], function() {
    Route::get('/', [App\Http\Controllers\Provider\NavigationController::class, 'dashboard'])->name('dashboard');
});

Route::prefix('dev')->group(function(){
	Route::get('config-clear', function(){
		try{
			\Artisan::call('config:clear');
			echo "Configuration cache cleared!";
		} catch( \Exception $e) {
			dd($e->getMessage());
		}
	});
});

Route::prefix('dev')->group(function(){
	Route::get('route-clear', function(){
		try{
			\Artisan::call('route:clear');
			echo "Route cache cleared!";
		} catch( \Exception $e) {
			dd($e->getMessage());
		}
	});
});

Route::prefix('dev')->group(function(){
	Route::get('view-clear', function(){
		try{
			\Artisan::call('view:clear');
			echo "View cache cleared!";
		} catch( \Exception $e) {
			dd($e->getMessage());
		}
	});
});

Route::prefix('dev')->group(function(){
	Route::get('config-cache', function(){
		try{
			\Artisan::call('config:cache');
			echo "Configuration cache cleared!";
			echo "Configuration cached successfully!";
		} catch( \Exception $e) {
			dd($e->getMessage());
		}
	});
});

Route::prefix('dev')->group(function(){
	Route::get('route-cache', function(){
		try{
			\Artisan::call('route:cache');
			echo "Route cache cleared!";
			echo "Route cached successfully!";
		} catch( \Exception $e) {
			dd($e->getMessage());
		}
	});
});

Route::prefix('dev')->group(function(){
	Route::get('view-cache', function(){
		try{
			\Artisan::call('view:cache');
			echo "View cache cleared!";
			echo "View cached successfully!";
		} catch( \Exception $e) {
			dd($e->getMessage());
		}
	});
});

