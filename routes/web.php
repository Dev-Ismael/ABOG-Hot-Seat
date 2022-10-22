<?php


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


Auth::routes();


/*===========================================================
====== Web Routes
============================================================*/
Route::get('/',  [App\Http\Controllers\HomeController::class, 'home']);


/*===========================================================
====== Admin Routes
============================================================*/
Route::get('admin/{any}', [App\Http\Controllers\Admin\AdminController::class, 'index'])
->middleware('auth') -> where([ "any" => ".*" ]);

