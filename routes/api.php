<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');
Route::get('/me', 'AuthController@me');
Route::delete('/customers/{id}', 'CustomerController@deleteCustomer');




Route::get('/productCategories', 'ProductCategoryController@getProductCategories');
Route::post('/productCategories', 'ProductCategoryController@saveProductCategory');
Route::patch('/productCategories', 'ProductCategoryController@updateProductCategory');
Route::patch('/productCategories/{id}', 'ProductCategoryController@updateProductCategoryBy');


//products
Route::get('/products', 'ProductController@index');
Route::post('/products', 'ProductController@saveProduct');
Route::patch('/products', 'ProductController@updateProduct');
Route::patch('/products/{id}', 'ProductController@updateProductByID');
Route::delete('/products/{id}', 'ProductController@deleteProduct');


//customers
Route::get('/customers', 'CustomerController@index');
Route::get('/customers/{id}', 'CustomerController@getCustomerById');
Route::post('/customers', 'CustomerController@saveCustomer');
Route::patch('/customers', 'CustomerController@updateCustomer');
Route::patch('/customers/{id}', 'CustomerController@updateCustomerByID');
Route::delete('/customers/{id}', 'CustomerController@deleteCustomerByID');

//vendor
Route::get('/vendors', 'VendorController@index');
Route::get('/vendors/{id}', 'VendorController@getVendorById');
Route::post('/vendors', 'VendorController@saveVendor');
Route::patch('/vendors', 'VendorController@updateVendor');
Route::patch('/vendors/{id}', 'VendorController@updateVendorByID');
Route::delete('/vendor/{id}', 'CustomerController@deleteVendorByID');




//secured links here
Route::group(['middleware' => ['jwt.auth']], function() {
    Route::get('logout', 'AuthController@logout');

//    Route::post('/products', 'ProductController@saveProduct');
//    Route::patch('/products', 'ProductController@updateProduct');
//    Route::delete('/products/{id}', 'ProductController@deleteProduct');

    Route::get('/materials', 'MaterialController@getMaterials');
    Route::get('/orderMaterials', 'MaterialController@getOrderMaterials');


//    Route::get('/customers', 'CustomerController@index');
//    Route::post('/customers', 'CustomerController@saveCustomer');
//    Route::patch('/customers/{id}', 'CustomerController@updateCustomer');


    Route::delete('/ordersDetailsDelete/{id}', 'OrderDetailController@deleteOrder');

    Route::get('test', function(){
        return response()->json(['foo'=>'bar']);
    });
});
