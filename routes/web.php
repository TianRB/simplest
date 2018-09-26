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

/*
| Rutas de Frontend
*/
Route::get('/', 'FrontController@index')->name('landing');

/*
| Rutas de Backend
*/
Route::get('/home', 'BackController@index')->name('home');
/*// only users with roles that have the 'manage_posts' permission will be able to access any route within admin/post
Entrust::routeNeedsPermission('admin/post*', 'create-post');

// only owners will have access to routes within admin/advanced
Entrust::routeNeedsRole('admin/advanced*', 'owner');*/

// Auth
Auth::routes();
