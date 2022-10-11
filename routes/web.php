<?php

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

Route::redirect('/', '/dev/welcome');

Route::group(['prefix'=>'layout', 'name'=>'layout'], function(){
    Route::get('vue', function () {
        return view('layouts.vue');
    })->name('vue');
    Route::get('web', function () {
        return view('layouts.web');
    })->name('web');
});

Route::group(['prefix'=>'dev', 'name'=>'dev'], function(){
    Route::get('welcome', function () {
        return view('dev/welcome');
    })->name('welcome');
    Route::get('debug', function () {
        return view('dev/debug');
    })->name('debug');
});

Route::get('/', function () {
    return view('vue');
})->name('vue');
