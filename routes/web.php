<?php

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

use App\Http\Controllers\CounterController;

// 计数器主页
Route::get('/', function () {
    return view('counter');
});

// 获取当前计数
Route::get('/api/count', 'CounterController@getCount');

// 更新计数，自增或者清零
Route::post('/api/count', 'CounterController@updateCount');