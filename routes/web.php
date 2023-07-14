<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\Admin\IvoicesController;
use App\Http\Controllers\Admin\PrivacyController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ComplainController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\notificationController;
use App\Http\Controllers\Admin\NotificationSendController;


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




Route::middleware('isAdmin')->group(function () {


    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('root');
    Route::get('/order', [OrderController::class, 'index'])->name('orders.show');
    Route::get('/order-pending', [OrderController::class, 'pending'])->name('orders.pendingg');
    Route::get('/order-delivered', [OrderController::class, 'delivered'])->name('orders.delivered');
    Route::get('/order-inprograss', [OrderController::class, 'inprograss'])->name('orders.inprograss');
    Route::get('/order-rejected', [OrderController::class, 'rejected'])->name('orders.rejected');
    Route::get('/order-cancelled', [OrderController::class, 'cancelled'])->name('orders.cancelled');
    Route::get('/order-paid', [OrderController::class, 'orderPaid'])->name('orders.paid.show');
    Route::get('/active/{id}', [OrderController::class, 'Paid'])->name('orders.paid');
    Route::get('/inactive/{id}', [OrderController::class, 'UnPaid'])->name('orders.unpaid');

    //////////// start invoices All Routes //////////
    Route::get('/invoices-page', [IvoicesController::class, 'showtable'])->name('invoices.page');
    //////////// end invoices All Routes //////////


    //////////// Start Customers All Routes //////////

    Route::get('/users-show', [CustomerController::class, 'index'])->name('users.show');
    Route::get('/customers-show-{id}', [CustomerController::class, 'showcustomer'])->name('customers.show');
    Route::get('/users-order-{id}', [CustomerController::class, 'showuserorder'])->name('usersorder.show');
    Route::post('/order-payments', [CustomerController::class, 'paymentsStore'])->name('orders.payments');
    Route::get('/user-delete-{id}', [CustomerController::class, 'delete'])->name('user.delete');

    //////////// End Customers All Routes //////////

    //////////// Start Category All Routes //////////
    Route::middleware('permission:categories,admins')->group(function () {
        Route::get('/addCategory', [CategoryController::class, 'Add'])->name('category.add');
        Route::post('/add', [CategoryController::class, 'Store'])->name('category.store');
        Route::get('/show', [CategoryController::class, 'Show'])->name('category.show');
        Route::get('/edit-category-{id}', [CategoryController::class, 'Edit'])->name('category.edit');
        Route::post('/update-category', [CategoryController::class, 'Update'])->name('category.update');
        Route::get('/delete-category-{id}', [CategoryController::class, 'Delete'])->name('category.delete');
        Route::get('/category-page-{id}', [CategoryController::class, 'showPage'])->name('category.page');


        //////////// End Category All Routes //////////

        //////////// Start subCategory All Routes /////////

        Route::get('/subcategory-add', [SubCategoryController::class, 'Add'])->name('subcategory.add');
        Route::post('/subcategory-add', [SubCategoryController::class, 'Store'])->name('subcategory.store');
        Route::get('/subcategory-show', [SubCategoryController::class, 'Show'])->name('subcategory.show');
        Route::get('/subcategory-edit-{id}', [SubCategoryController::class, 'Edit'])->name('subcategory.edit');
        Route::post('/subcategory-update', [SubCategoryController::class, 'Update'])->name('subcategory.update');
        Route::get('/subcategory-delete/{id}', [SubCategoryController::class, 'Delete'])->name('subcategory.delete');

        //////////// End subCategory All Routes //////////


        //////////// Start Product All Routes //////////

        Route::get('/add2', [ProductController::class, 'Add'])->name('product.add');
        Route::get('/zero-{id}', [ProductController::class, 'zero'])->name('product.quentity.zero');
        Route::get('/ten-{id}', [ProductController::class, 'lessTen'])->name('product.quentity.ten');
        Route::get('/read-notifiction-{id}', [ProductController::class, 'readNotification'])->name('product.read-notification');
        Route::get('/addcands', [ProductController::class, 'addcands'])->name('product.addcolorandsize');
        Route::post('/addcands', [ProductController::class, 'ColorSizeStore'])->name('product.addcolorandsize.store');
        Route::post('/product-add', [ProductController::class, 'Store'])->name('product.store');
        Route::post('/product-search', [ProductController::class, 'Search'])->name('product.search');
        Route::get('/ajax-{id}', [ProductController::class, 'AjaxShow']);
        Route::get('/showp', [ProductController::class, 'Show'])->name('product.show');
        Route::get('/tags', [ProductController::class, 'tags'])->name('product.tags');
        Route::get('/product-edit-{id}', [ProductController::class, 'Edit'])->name('product.edit');
        Route::post('/product-update', [ProductController::class, 'Update'])->name('product.update');
        Route::get('/product-delete-{id}', [ProductController::class, 'Delete'])->name('product.delete');
        Route::get('/product-subcategory-{id}', [ProductController::class, 'showSub'])->name('product.show.subcategory');
    });



    //////////// End Product All Routes //////////


    //////////// Start city All Routes //////////

    Route::get('/add-city', [CityController::class, 'Add'])->name('city.add');
    Route::get('/city-show', [CityController::class, 'Show'])->name('city.show');
    Route::get('/city-edit-{id}', [CityController::class, 'Edit'])->name('city.edit');
    Route::post('/city-update', [CityController::class, 'Update'])->name('city.update');
    Route::get('/city-delete-{id}', [CityController::class, 'Delete'])->name('city.delete');
    Route::post('/city-add', [CityController::class, 'Store'])->name('city.store');

    Route::get('/add-area', [CityController::class, 'AddArea'])->name('area.add');
    Route::post('/area-add', [CityController::class, 'AreaStore'])->name('area.store');
    Route::get('/area-show', [CityController::class, 'ShowArea'])->name('area.show');
    Route::get('/area-edit-{id}', [CityController::class, 'EditArea'])->name('area.edit');
    Route::post('/area-update', [CityController::class, 'UpdateArea'])->name('area.update');
    Route::get('/area-delete-{id}', [CityController::class, 'DeleteArea'])->name('area.delete');
    Route::get('/city-page-{id}', [CityController::class, 'showPage'])->name('city.page');

    //////////// End city All Routes //////////


    //////////// Start Notification All Routes //////////

    Route::get('/addnotification', [notificationController::class, 'addnotification'])->name('notification.add');
    Route::post('/addnotification', [notificationController::class, 'storeNotification'])->name('notification.store');
    Route::get('/show-notification', [notificationController::class, 'shownotification'])->name('notification.show');
    Route::get('/read-allnotifiction-{id}', [notificationController::class, 'readNotification'])->name('notification.read-allnotification');
    Route::get('/edit-allnotifiction-{id}', [notificationController::class, 'EditNotification'])->name('notification.edit');
    Route::post('/edit-allnotifiction', [notificationController::class, 'UpdateNotification'])->name('notification.update');
    Route::get('/delete-allnotifiction-{id}', [notificationController::class, 'DeleteNotification'])->name('notification.delete');
    Route::post('/store-token', [NotificationSendController::class, 'updateDeviceToken'])->name('store.token');
    Route::post('/send-web-notification', [NotificationSendController::class, 'sendNotification'])->name('send.web-notification');

    //////////// End Notification All Routes //////////

    //////////// Start privacy All Routes //////////
    Route::get('/privacy-benesize-show', [PrivacyController::class, 'BeneShow'])->name('privacy.bene.show');
    Route::get('/privacy-benesize-edit-{id}', [PrivacyController::class, 'BeneEdit'])->name('privacy.bene.edit');
    Route::post('/privacy-benesize-update', [PrivacyController::class, 'BeneUpdate'])->name('privacy.bene.update');
    Route::get('/privacy-benesize-delete-{id}', [PrivacyController::class, 'BeneDelete'])->name('privacy.bene.delete');

    Route::get('/privacy-delivery-show', [PrivacyController::class, 'DeliveryShow'])->name('privacy.delivery.show');
    Route::get('/privacy-delivery-edit-{id}', [PrivacyController::class, 'DeliveryEdit'])->name('privacy.delivery.edit');
    Route::post('/privacy-delivery-update', [PrivacyController::class, 'DeliveryUpdate'])->name('privacy.delivery.update');
    Route::get('/privacy-delivery-delete-{id}', [PrivacyController::class, 'DeliveryDelete'])->name('privacy.delivery.delete');

    Route::get('/privacy-return-show', [PrivacyController::class, 'ReturnShow'])->name('privacy.return.show');
    Route::get('/privacy-return-edit-{id}', [PrivacyController::class, 'ReturnEdit'])->name('privacy.return.edit');
    Route::post('/privacy-return-update', [PrivacyController::class, 'ReturnUpdate'])->name('privacy.return.update');
    Route::get('/privacy-return-delete-{id}', [PrivacyController::class, 'ReturnDelete'])->name('privacy.return.delete');

    Route::get('/privacy-warranty-show', [PrivacyController::class, 'WarrantyShow'])->name('privacy.warranty.show');
    Route::get('/privacy-warranty-edit-{id}', [PrivacyController::class, 'WarrantyEdit'])->name('privacy.warranty.edit');
    Route::post('/privacy-warranty-update', [PrivacyController::class, 'WarrantyUpdate'])->name('privacy.warranty.update');
    Route::get('/privacy-warranty-delete-{id}', [PrivacyController::class, 'WarrantyDelete'])->name('privacy.warranty.delete');

    Route::get('/privacy-terms-show', [PrivacyController::class, 'TermsShow'])->name('privacy.terms.show');
    Route::get('/privacy-terms-edit-{id}', [PrivacyController::class, 'TermsEdit'])->name('privacy.terms.edit');
    Route::post('/privacy-terms-update', [PrivacyController::class, 'TermsUpdate'])->name('privacy.terms.update');
    Route::get('/privacy-terms-delete-{id}', [PrivacyController::class, 'TermsDelete'])->name('privacy.terms.delete');



    //////////// End privacy All Routes //////////
    //////////// Start privacy All Routes //////////
    Route::get('/addcomplain', [ComplainController::class, 'addcomplain'])->name('complain.show');

    //////////// End privacy All Routes //////////
    //////////// Start employee All Routes //////////
    Route::get('/addemployeerole', [EmployeeController::class, 'addemployee'])->name('employee.add.role');
    Route::post('/employee-role-update', [EmployeeController::class, 'UpdateRole'])->name('employee.update.role');
    Route::post('/employee-update', [EmployeeController::class, 'UpdateEmployee'])->name('employee.update');
    Route::patch('/user-{user}', [EmployeeController::class, 'updateStatus'])->name('user.updateStatus');
    Route::get('/delete-employee-{id}', [EmployeeController::class, 'delete'])->name('employee.delete');

    // Route::get('/role-test', [RoleController::class, 'show'])->name('role.test');

    Route::get('/addnewemployee', [EmployeeController::class, 'addnewemployee'])->name('employee.add');
    Route::get('/showemployee', [EmployeeController::class, 'showemployee'])->name('employee.show');

    //////////// End employee All Routes //////////
    //////////// Start social All Routes //////////
    Route::get('/addsocial', [SocialController::class, 'addsocial'])->name('social.add');
    Route::post('/addsocial', [SocialController::class, 'social_store'])->name('social.store');
    Route::get('/delete-social-{id}', [SocialController::class, 'delete'])->name('social.delete');
    //////////// End social All Routes //////////

    //////////// Start coupon All Routes ////////
    Route::get('/addcoupon', [CouponController::class, 'addcoupon'])->name('coupon.add');
    Route::get('/show-coupon', [CouponController::class, 'showcoupon'])->name('coupon.show');
    Route::post('/addcoupon', [CouponController::class, 'coupon_update'])->name('coupon.update');
    Route::patch('/coupon-{coupon}', [CouponController::class, 'updateStatus'])->name('coupon.updateStatus');
    Route::get('/coupon-delete-{id}' , [CouponController::class, 'coupon_delete'])->name('coupon.delete');
    //////////// End coupon All Routes //////////

    //////////// Start slieds All Routes ////////

    Route::get('/addslide', [SliderController::class, 'addslide'])->name('slide.add');
    Route::post('/slide-update', [SliderController::class, 'update_slide'])->name('slide.update');
    Route::get('/api-{type}s', [SliderController::class, 'getOptions'])->name('slide.get');
    Route::get('/delete-slide-{id}', [SliderController::class, 'delete'])->name('slide.delete');
    Route::get('/showslides', [SliderController::class, 'showslides'])->name('slides.show');

    //////////// End slides All Routes //////////
    // Route::get('test-test1', [ComplainController::class, 'addcomplain']);

});


