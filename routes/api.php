<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CheckoutingController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\ProductsController;
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
Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

Route::get('products',[ProductsController::class,'product']);
Route::get('products/{slug}',[ProductsController::class,'productDetails']);
// Route::post('login',[AuthController::class,'login']);



Route::controller(CheckoutingController::class)->group(function(){
    Route::get('cartApi-list','cartIndex');
    Route::post('add-cart','cartStore');
    Route::post('makeApi-order','makeOrders');
    Route::delete('cartApi-destroy/{id}','cartDestroy');
    Route::get('myApi-order-list','myorder');

});


Route::controller(DashboardController::class)->group(function(){
    //Api Admin
    Route::get('userApi-list','userList');
    Route::delete('userApi-delete/{id}','userDelete');
    //Api User
    Route::post('userApi-update','userUpdate');
    Route::patch('userApi-update-seller','userToSeller');

    //Api Product
    Route::get('productApi-search','productSearch');
    Route::get('productApi-list','productSeller');
    Route::get('productApi-details/{id}','productSellerShow');
    Route::post('productApi-add','productStore');
    Route::post('productApi-edit/{id}','productUpdate');
    Route::delete('productApi-delete/{id}','productDestroy');

    //Api Category
    Route::get('categoryApi-list','categoryList');
    Route::get('categoryApi-detail/{id}','categoryShow');
    Route::post('categoryApi-add','categoryAdd');
    Route::post('categoryApi-update/{id}','categoryUpdate');
    Route::delete('categoryApi-delete/{id}','categoryDestroy');

    Route::get('myApi-sellingproduct','sellProdList');
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
