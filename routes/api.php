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

Route::delete('/customers/{id}', 'CustomerController@deleteCustomer');


Route::get('/testMails', 'MailController@sendMail');

Route::group(array('prefix' => 'dev'), function()
{

    //productCategories
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
    Route::delete('/vendors/{id}', 'VendorController@deleteVendorByID');
    Route::get('/vendors/{id}/integrityCount', 'VendorController@getIntegrityCount');
    Route::get('/vendors/{id}/isDeletable', 'VendorController@isDeletable');


    Route::get('/purchases', 'PurchaseController@getAllPurchases');
    Route::get('/purchases/{id}/id', 'PurchaseController@purchasseById');
    Route::get('/purchases/{invoice}/invoice', 'PurchaseController@purchaseByInvoice');
    Route::post('/purchases', 'PurchaseController@savePurchase');

    Route::post('/sales', 'SaleController@saveSale');
    Route::get('/sales', 'SaleController@getAllSales');
    Route::get('/sales/{id}', 'SaleController@saleDetailsById');

    //unit
    Route::get('/units', 'UnitController@index');

    //customer Categories
    Route::get('/customerCategories', 'CustomerCategoryController@index');


});
















Route::get('/testPurchase', 'PurchaseController@testPurchase');


Route::get('/purchaseDetails/{id}', 'PurchaseController@getPurchaseDetailsByTransactionMasterID');





Route::get('/testTransaction/{id}', 'TransactionMasterController@testTransaction');


// Vouchers
Route::get('/vouchers', 'VoucherController@index');


//secured links here
Route::group(['middleware' => ['jwt.auth']], function() {
    Route::get('/me', 'AuthController@me');
    Route::get('/refresh', 'AuthController@refresh');
    Route::get('logout', 'AuthController@logout');

    Route::get('/purchases', 'PurchaseController@getAllPurchases');
    Route::get('/purchases/{id}/id', 'PurchaseController@purchasseById');
    Route::get('/purchases/{invoice}/invoice', 'PurchaseController@purchaseByInvoice');
    Route::post('/purchases', 'PurchaseController@savePurchase');

    //vendor
    Route::get('/vendors', 'VendorController@index');
    Route::get('/vendors/{id}', 'VendorController@getVendorById');
    Route::post('/vendors', 'VendorController@saveVendor');
    Route::patch('/vendors', 'VendorController@updateVendor');
    Route::patch('/vendors/{id}', 'VendorController@updateVendorByID');
    Route::delete('/vendors/{id}', 'VendorController@deleteVendorByID');
    Route::get('/vendors/{id}/integrityCount', 'VendorController@getIntegrityCount');
    Route::get('/vendors/{id}/isDeletable', 'VendorController@isDeletable');

    //Customers
    Route::get('/customers', 'CustomerController@index');
    Route::get('/customers/{id}', 'CustomerController@getCustomerById');
    Route::post('/customers', 'CustomerController@saveCustomer');
    Route::patch('/customers', 'CustomerController@updateCustomer');
    Route::patch('/customers/{id}', 'CustomerController@updateCustomerByID');
    Route::delete('/customers/{id}', 'CustomerController@deleteCustomerByID');

    //products
    Route::get('/products', 'ProductController@index');
    Route::post('/products', 'ProductController@saveProduct');
    Route::patch('/products', 'ProductController@updateProduct');
    Route::patch('/products/{id}', 'ProductController@updateProductByID');
    Route::delete('/products/{id}', 'ProductController@deleteProduct');

    //productCategories
    Route::get('/productCategories', 'ProductCategoryController@getProductCategories');
    Route::post('/productCategories', 'ProductCategoryController@saveProductCategory');
    Route::patch('/productCategories', 'ProductCategoryController@updateProductCategory');
    Route::patch('/productCategories/{id}', 'ProductCategoryController@updateProductCategoryBy');

    Route::post('/sales', 'SaleController@saveSale');
    Route::get('/sales', 'SaleController@getAllSales');
    Route::get('/sales/{id}', 'SaleController@saleDetailsById');

    //unit
    Route::get('/units', 'UnitController@index');

    //customer Categories
    Route::get('/customerCategories', 'CustomerCategoryController@index');

    Route::get('test', function(){
        return response()->json(['foo'=>'bar']);
    });
});
