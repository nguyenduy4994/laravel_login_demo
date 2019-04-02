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

Route::get('/', 'GoiNuocController@index')->name('goi-nuoc');
Route::post('/goi-nuoc', 'GoiNuocController@store')->name('goi-nuoc-uong');
Route::get('/danh-sach/{id}', 'GoiNuocController@orders')->name('danh-sach-don');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
