<?php

// use App\Http\Controllers\CategoryController;

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
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

Route::get('/','Frontend\FrontendController@index');

//  frontend routes start 
Route::get('all-products','Frontend\FrontendController@allProducts')->name('products.listing');
Route::get('product-detail/{product}','Frontend\FrontendController@productDetail')->name('product.detail');
Route::post('/search','Frontend\FrontendController@search')->name('search');
// end of frontend routes //


Route::group(['middleware' => ['auth','admin'] , 'namespace' => 'Admin'] , function  () {
    Route::get('/admin', function () {
        return view('admin.layout.master');
    });

    // User routes
    Route::resource('users', 'UserController');

    // Category routes
    Route::resource('/categories', 'CategoryController');
    Route::get('/categories/delete/{category}','CategoryController@destroy')->name('categories.destroy');
    
    // SubCategory routes
    Route::resource('/subcategories', 'SubCategoryController');

     // Brands routes
     Route::resource('/brands', 'BrandController');
    Route::get('/brands/delete/{brand}','BrandController@destroy')->name('brands.destroy');

    // Products routes
     Route::resource('/products', 'ProductController');
    Route::get('/products/delete/{product}','ProductController@destroy')->name('products.destroy');

});

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();
