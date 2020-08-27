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

Auth::routes();

// Site route
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::post('/search','HomeController@search')->name('search');

Route::get('/categorie/{id}', 'HomeController@get_category_content')->name('get_category_content');
Route::get('/article/{id}', 'HomeController@get_article_content')->name('get_article_content');

Route::get('/article/like/{id}', 'HomeController@send_like')->name('send_like');

Route::get('/chats', 'ChatController@index');
Route::get('/messages', 'ChatController@fetchAllMessages');
Route::post('/messages', 'ChatController@sendMessage');

Route::post('/article/{id}/comments', 'CommentsController@store');

// Admin routes
Route::get('/home/admin', 'AdminController@index')->name('home_article');
Route::get('/home/admin/user/', 'AdminController@index_user')->name('home_user');
Route::get('/home/admin/category', 'AdminController@index_category')->name('home_category');

Route::get('/home/admin/add/article', 'AdminController@add_article')->name('add_article');
Route::get('/home/admin/add/category', 'AdminController@add_category')->name('add_category');

Route::get('/home/admin/delete/category/{id}', 'AdminController@delete_category')->name('delete_category');
Route::get('/home/admin/delete/article/{id}', 'AdminController@delete_article')->name('delete_article');

Route::get('/home/admin/edit/category/{id}', 'AdminController@edit_category')->name('edit_category');
Route::get('/home/admin/edit/article/{id}', 'AdminController@edit_article')->name('edit_article');

Route::post('/home/admin/update/category', 'AdminController@update_category')->name('update_category');
Route::post('/home/admin/update/article', 'AdminController@update_article')->name('update_article');

Route::post('/home/admin/create/article', 'AdminController@create_new_article')->name('create_article');
Route::post('/home/admin/create/category', 'AdminController@create_new_category')->name('create_category');

