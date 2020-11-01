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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
});


Route::get('/testss', 'testtt@index');

//另一解法（第一個解法）
//https://www.itsolutionstuff.com/post/laravel-8-target-class-productcontroller-does-not-exist-solvedexample.html
// use App\Http\Controllers\testtt;
// Route::get('testss', [testtt::class, 'index']);
