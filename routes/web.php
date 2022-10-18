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

Route::redirect('/cv', '/CV');
Route::group([
  'domain'=>'www.' . env('APP_URL'),
  'name'=>'www'
], function(){
  Route::get('/', function () {
    return view('welcome');
  });
  route::get('/CV', function(){
    return view('portfolio/cv');
  });
});

Route::group([
  'domain'=>'webquest.' . env('APP_URL'),
  'name'=>'webquest'
], function(){
  Route::get('/', function () {
    return view('webquest/app');
  });
});

Route::group([
  'domain'=>'dev.' . env('APP_URL'),
  'name'=>'dev',
], function(){
  Route::get('debug', function () {
    return view('dev/debug');
  })->name('debug');
});