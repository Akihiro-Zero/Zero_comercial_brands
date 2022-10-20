<?php

use App\Events\Message;
use Illuminate\Http\Request;
use App\Illuminate\Http\Response;
use App\Http\Controllers\ComercialController;
use App\Http\Controllers\Web\CartsController;
use App\Http\Controllers\Web\CategoriesController;
use App\Http\Controllers\Web\CheckoutController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\PaymentController;
use App\Http\Controllers\Web\ProductsController;
use App\Http\Controllers\Web\WishlistController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
Route::controller(ComercialController::class)->group(function(){
    Route::get('/','index');
    Route::get('product-details/{slug}','details');
    // Route::get('about-us','about');
    // Route::get('contact-us', 'contact');
    // Route::get('return-policy', 'return');
});

Route::get('about-us',function(){
    return view('comercial-about');
});
Route::get('contact-us',function(){
    return view('comercial-contact');
});
Route::get('return-policy',function(){
    return view('comercial-return-policy');
});

Route::get('shop',[ProductsController::class,'indexAll']);
Route::get('category/{id}',[ProductsController::class,'indexCategory']);
Route::post('product-search',[ProductsController::class,'indexAll']);

Route::get('dashboard-chat',function(){
    return view('dashboard.chat-app.dashboard-chatt');
});
Route::middleware(['auth'])->group(function(){
    //User Interface
    Route::get('cart',[CartsController::class,'index']);
    Route::get('wishlist',[WishlistController::class,'index']);
    Route::get('delete-cart/{id}',[CartsController::class,'delete']);
    Route::post('add-cart',[CartsController::class,'store'])->name('add-cart');
    Route::post('add-wishlist',[WishlistController::class,'store'])->name('add-wishlist');

    Route::get('checkout',[CheckoutController::class,'index']);
    // Route::post('checkout',[CheckoutController::class,'store'])->name('checkout');

    Route::get('dashboard-page',[DashboardController::class,'index'])->name('dashboard');
    Route::get('user-profile',[DashboardController::class,'profile']);
    Route::get('user-wallet',[DashboardController::class,'wallet']);

    Route::get('seller-registration',[DashboardController::class,'register']);
    Route::get('seller-update',[DashboardController::class,'register']);
    Route::post('seller-update/{id}',[DashboardController::class,'sellerupdate']);
    Route::post('update-user/{id}',[DashboardController::class,'update']);

    Route::get('product-list',[ProductsController::class,'index']);
    Route::get('product-add',[ProductsController::class,'add']);
    Route::get('product-edit/{slug}',[ProductsController::class,'edit']);
    Route::post('product-store',[ProductsController::class,'store']);
    Route::post('product-update/{id}',[ProductsController::class,'productUpdate']);
    Route::get('product-destroy/{id}',[ProductsController::class,'destroy']);

    Route::get('order-list',[DashboardController::class,'orderList']);
    Route::get('order-details/{id}',[DashboardController::class,'orderDetails']);
    Route::post('order-sending/{id}',[DashboardController::class,'orderSend']);
    Route::post('order-takemoney/{id}',[DashboardController::class,'orderTakeMoney']);
    Route::get('my-order-list',[DashboardController::class,'myOrder']);
    Route::get('my-order-details/{id}',[DashboardController::class,'myOrderDetail']);
    Route::post('my-order-cancel/{id}',[DashboardController::class,'myOrderCancel']);
    Route::post('my-order-confirm/{id}',[DashboardController::class,'myOrderConfirm']);



    //admin interface
    Route::get('user-list',[DashboardController::class,'userList']);
    Route::get('user-destroy/{id}',[DashboardController::class,'userDestroy']);

    Route::get('category-list',[CategoriesController::class,'index']);
    Route::get('category-add',[CategoriesController::class,'add']);
    Route::post('category-store',[CategoriesController::class,'store']);

    Route::get('category-edit/{slug}',[CategoriesController::class,'edit']);
    Route::post('category-update/{id}',[CategoriesController::class,'update']);

    //Payment
    Route::get('order-midtrans',[PaymentController::class,'midtrans']);
    Route::post('order-cod',[PaymentController::class,'paymentCOD'])->name('order-cod');
    //chatt
    Route::get('chatt-app/{name}',[DashboardController::class,'chat']);
    Route::post('chatt-send',[DashboardController::class,'sendchat'])->name('chatt-send');
    Route::get('chatt-get/{partner}',[DashboardController::class,'getchat']);
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

