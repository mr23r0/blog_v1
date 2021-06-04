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

Route::get('/','App\Http\Controllers\front\post@home');
Route::get('/post/{id}','App\Http\Controllers\front\post@post');
Route::get('/page/{id}','App\Http\Controllers\front\post@page');
Route::view('/contact','front.contact');
Route::post('/send_msg','App\Http\Controllers\front\post@sent_msg');


// ADMIN SYSTEM
Route::view('/admin/login','admin.login');
Route::post('/admin/login_submit','App\Http\Controllers\RegisterController@login_submit');

Route::get('/admin/logout', function(){
    session()->forget('user_id');
    return redirect('admin/login');
});

Route::group( ['middleware'=>['AdminAuth']],function(){
    Route::get('/admin/post/list','App\Http\Controllers\admin\Post@listing');
    Route::view('/admin/post/add','admin.post.add');
    Route::post('/admin/post/submit','App\Http\Controllers\admin\Post@submit');
    Route::get('/admin/post/delete/{id}','App\Http\Controllers\admin\Post@delete');
    Route::get('/admin/post/edit/{id}','App\Http\Controllers\admin\Post@edit');
    Route::post('/admin/post/update/{id}','App\Http\Controllers\admin\Post@update');


    Route::get('/admin/page/list','App\Http\Controllers\admin\page@listing');
    Route::view('/admin/page/add','admin.page.add');
    Route::post('/admin/page/submit','App\Http\Controllers\admin\page@submit');
    Route::get('/admin/page/delete/{id}','App\Http\Controllers\admin\page@delete');
    Route::get('/admin/page/edit/{id}','App\Http\Controllers\admin\page@edit');
    Route::post('/admin/page/update/{id}','App\Http\Controllers\admin\page@update');


    Route::get('/admin/contact/list','App\Http\Controllers\admin\contact@listing');

});




