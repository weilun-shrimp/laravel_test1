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


//laravel官方第八板推薦使用controller寫法
use App\Http\Controllers\testtt;
Route::get('testss', [testtt::class, 'index'])->name('show.indexpage');

//另一解法, 要先將app/providers/RouteServiceProviders.php 引入基礎namespace
//https://www.itsolutionstuff.com/post/laravel-8-target-class-productcontroller-does-not-exist-solvedexample.html
//Route::get('/testss', 'testtt@index');






use App\Http\Controllers\PostsController;
//顯示最新blog list
Route::get('posts', [PostsController::class, 'index'])->name('posts.index');

//出現新增一篇文章模組表單
Route::get('posts/create', [PostsController::class, 'create'])->name('posts.create');

//儲存新增的文章, 用post傳遞
Route::post('posts/store', [PostController::class, 'store'])->name('posts.store');

//顯示指定的blog文章, 所以要指定傳入post_id在網址上（get）
Route::get('posts/{id}', [PostsController::class, 'show'])->name('posts.show');

//出現指定要修改的blog_post修改模組表單
Route::get('posts/{id}/edit', [PostsController::class, 'edit'])->name('posts.edit');

//儲存上面修改完的post資料, 官方建議用http嚴謹的內建patch方法
Route::patch('posts/{id}', [PostsController::class, 'update'])->name('posts.update');

//刪除指定的post
Route::delete('posts/{id}', [PostsController::class], 'destroy')->name('posts.destroy');