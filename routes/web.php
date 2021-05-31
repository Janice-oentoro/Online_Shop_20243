<?php

use Illuminate\Support\Facades\Route;
use App\Product;

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


Auth::routes();

// For admins, in kernel.php put this at protected $routeMiddleware
// 'admin' => \App\Http\Middleware\Admin::class,  
// copas at the very bottom of the list,  
// ^ PLEASE ADD THAT TO GENERAL GUIDE ^

// ADMINS ONLY
Route::group(['middleware'=>['auth', 'admin']],function(){
Route::get('/main', 'ProductController@index');
Route::get('/create', 'ProductController@create');
Route::post('/stores', 'ProductController@store');
Route::get('/update/{id}', 'ProductController@edit');
Route::put('/update/{id}', 'ProductController@update');
Route::delete('/delete/{id}', 'ProductController@destroy');
Route::get('/category', 'CategoryController@index');
Route::post('/category', 'CategoryController@store');
});
// ADMINS ONLY 

//USERS ONLY
Route::group(['middleware'=>['auth']],function(){
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/cart', 'CartController@index');
Route::post('/cart{id}', 'CartController@store');


});

//USERS ONLY



