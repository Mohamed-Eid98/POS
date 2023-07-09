<?php

use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\SizeController;
use App\Http\Controllers\Api\ColorController;
use App\Http\Controllers\Api\SliderController;
use App\Http\Controllers\Api\GeneralController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\SupportController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\SubCategoryController;
use  App\Http\Controllers\Api\CartController;
use  App\Http\Controllers\Api\OrderController;
use  App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\NotificationController;


Route::post('/product_img',[ProductController::class,'addMediaNew']);

Route::post('/checkPhoneNumber',[AuthController::class, 'checkPhone']);
Route::post('/verificationCodeNumber',[AuthController::class, 'checkCode']);
Route::post('/savePassword',[AuthController::class, 'save_password']);
Route::post('/register',[AuthController::class, 'register']);
Route::post('/login',[AuthController::class, 'login']);
Route::post('/changePassword', [AuthController::class, 'changePassword']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::post('/refresh', [AuthController::class, 'refresh']);

Route::post('/editProfile', [AuthController::class, 'editProfile']);
Route::post('/removeAccount', [AuthController::class, 'removeAccount']);
Route::get('/profile', [AuthController::class, 'userProfile']);

Route::post('/uploadImage', [AuthController::class, 'uploadImage']);


Route::post('/support', [SupportController::class, 'store']);

/////////////////////////////////////////////
///                     info              ///
/// /////////////////////////////////////////
Route::get('/countries', [GeneralController::class, 'countries']);
Route::get('/cities', [GeneralController::class, 'cities']);
Route::get('/areas', [GeneralController::class, 'areas']);



// Route::get('/sliders',[HomeController::class,'sliders']);
Route::get('/products',[ProductController::class,'index']);
Route::get('/categories',[CategoryController::class,'index']);
Route::get('/color',[ColorController::class,'index']);
Route::get('/size',[SizeController::class,'index']);


Route::post('/home',[HomeController::class,'get_home_info']);
Route::get('/product/{id}',[ProductController::class,'productDetail']);
Route::get('/size-products-by-color/{id}',[ProductController::class,'productSizeByColor']);

Route::get('/productFilters',[HomeController::class,'product_filters']);


Route::get('/get-carts',[CartController::class,'index']);
Route::post('carts/store-or-update',[CartController::class,'storeOrUpdate']);
Route::post('carts/remove',[CartController::class,'RemoveItem']);
Route::post('carts/remove-all',[CartController::class,'RemoveAll']);


Route::group(['prefix' => 'orders'], function () {
    Route::post('get-all',[OrderController::class,'index']);
    Route::post('get-orders-count',[OrderController::class,'ordersCount']);
    Route::post('get-future-profits',[OrderController::class,'futureProfit']);
    Route::post('get-realized-profits',[OrderController::class,'realizedProfit']);
    Route::get('show/{id}',[OrderController::class,'show']);
    Route::post('store',[OrderController::class,'store']);
    Route::post('get-shipping-cost',[OrderController::class,'getShippingCost']);
    Route::post('check-coupon',[OrderController::class,'getCoupon']);
    Route::get('get-carts',[OrderController::class,'indexCarts']);
});
Route::group(['prefix' => 'payments'], function () {
    Route::post('get-received',[PaymentController::class,'indexReceived']);
    Route::post('get-show',[PaymentController::class,'show']);

});


Route::post('/addFavProduct',[ProductController::class,'add_fav_product']);
Route::get('/getFavouriteProducts',[ProductController::class,'get_favourite_products']);

Route::post('/sub_categories',[SubCategoryController::class,'get_all_sub_categories']);

Route::post('/sub_categories/products',[SubCategoryController::class,'get_all_products']);

Route::post('/add_customer',[CustomerController::class,'create_customer']);

Route::get('/get_customers',[CustomerController::class,'get_all_customers_per_user']);
Route::get('/get_customer/{customer_id}',[CustomerController::class,'get_customer']);
Route::post('/search_customer',[CustomerController::class,'search_customer']);
Route::post('/edit-customer',[CustomerController::class,'edit_customer']);
Route::post('/delete-customer',[CustomerController::class,'delete_customer']);

Route::post('/show_slider',[SliderController::class,'get_products']);

Route::get('infos', [GeneralController::class, 'infos']);
Route::get('icons', [GeneralController::class, 'icons']);
Route::post('contact-us', [GeneralController::class, 'contactUs']);
Route::get('latest-version', [GeneralController::class, 'updateVersion']);
///////////////////////////////// start notifications //////////////////////////////////////////
Route::get('notifications', [NotificationController::class, 'index']);
Route::get('notifications/notice' , [NotificationController::class , 'indexNotice']);
Route::post('notifications/save_token' , [NotificationController::class , 'save_token']);
Route::get('notifications/count' , [NotificationController::class , 'count']);
Route::post('notifications/status' , [NotificationController::class , 'changeStatus']);

///////////////////////////////// end notifications ///////////////////////////////////////////////

