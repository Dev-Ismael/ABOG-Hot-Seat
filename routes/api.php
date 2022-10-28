<?php

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



/*===========================================================
====== Admin APIs
============================================================*/
Route::group([ 'prefix' => 'admin' ] , function(){     // URL ==> 'api/admin' ,


    Route::get('info',  [\App\Http\Controllers\Admin\AdminController::class, 'getAuthInfo']);
    Route::post('update-info',  [\App\Http\Controllers\Admin\AdminController::class, 'updateAdminInfo']);

    Route::get('statistics',  [\App\Http\Controllers\Admin\AdminController::class, 'statistics']);

    // Users
    Route::resource('user', '\App\Http\Controllers\Admin\UserController');
    Route::post('user/search' , [App\Http\Controllers\Admin\UserController::class, 'search'])->name("user.search");
    Route::post('user/multiAction' , [App\Http\Controllers\Admin\UserController::class, 'multiAction'])->name("user.multiAction");

    // Messeges
    Route::resource('messege', '\App\Http\Controllers\Admin\MessegeController');
    Route::post('messege/search' , [App\Http\Controllers\Admin\MessegeController::class, 'search'])->name("messege.search");
    Route::post('messege/multiAction' , [App\Http\Controllers\Admin\MessegeController::class, 'multiAction'])->name("messege.multiAction");

    // Orders
    Route::resource('order', '\App\Http\Controllers\Admin\OrderController');
    Route::post('order/search' , [App\Http\Controllers\Admin\OrderController::class, 'search'])->name("order.search");
    Route::post('order/multiAction' , [App\Http\Controllers\Admin\OrderController::class, 'multiAction'])->name("order.multiAction");

    // Plans
    Route::resource('plan', '\App\Http\Controllers\Admin\PlanController');
    Route::post('plan/search' , [App\Http\Controllers\Admin\PlanController::class, 'search'])->name("plan.search");
    Route::post('plan/multiAction' , [App\Http\Controllers\Admin\PlanController::class, 'multiAction'])->name("plan.multiAction");

    // Settings
    Route::get('settings' , [App\Http\Controllers\Admin\SettingController::class, 'show'])->name("settings.show");
    Route::post('settings' , [App\Http\Controllers\Admin\SettingController::class, 'update'])->name("settings.update");


});
