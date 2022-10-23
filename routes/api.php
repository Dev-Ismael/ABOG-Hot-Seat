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
====== Web APIs
============================================================*/

// settings
Route::get('settings' , [App\Http\Controllers\SettingController::class, 'show'])->name("settings.show");

// messege
Route::post('messege/store' , [App\Http\Controllers\MessegeController::class, 'store'])->name("messege.store");

// subscriber
Route::post('subscriber/store' , [App\Http\Controllers\SubscriberController::class, 'store'])->name("subscriber.store");

// Clients
Route::get('clients' , [App\Http\Controllers\ClientController::class, 'index'])->name("clients.index");




/*===========================================================
====== Admin APIs
============================================================*/
Route::group([ 'prefix' => 'admin' ] , function(){     // URL ==> 'api/admin' ,


    Route::get('info',  [\App\Http\Controllers\Admin\AdminController::class, 'getAuthInfo']);

    Route::get('statistics',  [\App\Http\Controllers\Admin\AdminController::class, 'statistics']);

    // Users
    Route::resource('user', '\App\Http\Controllers\Admin\UserController');
    Route::post('user/search' , [App\Http\Controllers\Admin\UserController::class, 'search'])->name("user.search");
    Route::post('user/multiAction' , [App\Http\Controllers\Admin\UserController::class, 'multiAction'])->name("user.multiAction");


    // Messeges
    Route::resource('messege', '\App\Http\Controllers\Admin\MessegeController');
    Route::post('messege/search' , [App\Http\Controllers\Admin\MessegeController::class, 'search'])->name("messege.search");
    Route::post('messege/multiAction' , [App\Http\Controllers\Admin\MessegeController::class, 'multiAction'])->name("messege.multiAction");

    // Plans
    Route::resource('plan', '\App\Http\Controllers\Admin\PlanController');
    Route::post('plan/search' , [App\Http\Controllers\Admin\PlanController::class, 'search'])->name("plan.search");
    Route::post('plan/multiAction' , [App\Http\Controllers\Admin\PlanController::class, 'multiAction'])->name("plan.multiAction");

    // Subscribers
    Route::resource('subscriber', '\App\Http\Controllers\Admin\SubscriberController');
    Route::post('subscriber/search' , [App\Http\Controllers\Admin\SubscriberController::class, 'search'])->name("subscriber.search");
    Route::post('subscriber/multiAction' , [App\Http\Controllers\Admin\SubscriberController::class, 'multiAction'])->name("subscriber.multiAction");

    // Newsletters
    Route::resource('newsletter', '\App\Http\Controllers\Admin\NewsletterController');
    Route::post('newsletter/search' , [App\Http\Controllers\Admin\NewsletterController::class, 'search'])->name("newsletter.search");
    Route::post('newsletter/multiAction' , [App\Http\Controllers\Admin\NewsletterController::class, 'multiAction'])->name("newsletter.multiAction");



    // Seo Managment
    Route::get('seo-management' , [App\Http\Controllers\Admin\SeoManagementController::class, 'show'])->name("seo-management.show");
    Route::post('seo-management' , [App\Http\Controllers\Admin\SeoManagementController::class, 'update'])->name("seo-management.update");


    // Settings
    Route::get('settings' , [App\Http\Controllers\Admin\SettingController::class, 'show'])->name("settings.show");
    Route::post('settings' , [App\Http\Controllers\Admin\SettingController::class, 'update'])->name("settings.update");


});
