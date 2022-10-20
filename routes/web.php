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


// Route::group([
    //     'prefix'=>'layout',
    //     'name'=>'layout',
// ], function(){
    //     Route::get('vue', function () {
        //         return view('layouts.vue');
        //     })->name('vue');
        //     Route::get('web', function () {
            //         return view('layouts.web');
//     })->name('web');
// });

/**
 * Subdomain: portfolio
 * Name: portfolio.
 */
Route::group([
    'domain' => 'portfolio.' . env('APP_URL'),
    'as' => 'portfolio.',
    'controller' => 'App\Http\Controllers\Portfolio\PortfolioController',
  ], function(){
    route::get('/cv', 'cv')->name('cv');
    route::get('/cv/download', 'toPDF')->name('cv.download');
  }
);

/**
 * Subdomain: webquest
 * Name: webquest.
 */
Route::group([
    'domain'=>'webquest.' . env('APP_URL'),
    'as'=>'webquest'
  ], function(){
    Route::get('/', function () {
      return view('webquest/app');
    })->name('app');
  }
);

/**
 * Subdomain: dev
 * Name: dev.
 */
Route::group([
    'domain'=>'dev.' . env('APP_URL'),
    'as'=>'dev',
  ], function(){
    Route::get('debug', function () {
      return view('dev/debug');
    })->name('debug');
  }
);

/**
 * Subdomain: www
 * Name: www.
 */
Route::group([
    'domain'=>'www.' . env('APP_URL'),
    'as'=>'www'
  ], function(){
    Route::get('/', function () {
      return view('welcome');
    })->name('welcome');
  }
);
