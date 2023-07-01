<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\IvoicesController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\notificationController;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');


Route::get('/about', function () {
    return view('form-uploads');
});




Route::get('/order', [OrderController::class, 'index'])->name('orders.show');
Route::get('/order-pending', [OrderController::class, 'pending'])->name('orders.pendingg');
Route::get('/order-delivered', [OrderController::class, 'delivered'])->name('orders.delivered');
Route::get('/order-inprograss', [OrderController::class, 'inprograss'])->name('orders.inprograss');
Route::get('/order-rejected', [OrderController::class, 'rejected'])->name('orders.rejected');
Route::get('/order-cancelled', [OrderController::class, 'cancelled'])->name('orders.cancelled');
Route::get('/order-paid', [OrderController::class, 'orderPaid'])->name('orders.paid.show');Route::get('/active/{id}', [OrderController::class, 'Paid'])->name('orders.paid');
Route::get('/inactive/{id}', [OrderController::class, 'UnPaid'])->name('orders.unpaid');

//////////// start invoices All Routes //////////
Route::get('/invoices-page', [IvoicesController::class, 'showtable'])->name('invoices.page');
//////////// end invoices All Routes //////////

Route::get('/customers-show', [CustomerController::class, 'index'])->name('customers.show');
Route::get('/user-delete-{id}', [CustomerController::class, 'delete'])->name('user.delete');


//////////// Start Category All Routes //////////
Route::get('/addCategory', [CategoryController::class, 'Add'])->name('category.add');
Route::post('/add', [CategoryController::class, 'Store'])->name('category.store');
Route::get('/show', [CategoryController::class, 'Show'])->name('category.show');
Route::get('/edit-{id}', [CategoryController::class, 'Edit'])->name('category.edit');
Route::post('/update', [CategoryController::class, 'Update'])->name('category.update');
Route::get('/delete-{id}', [CategoryController::class, 'Delete'])->name('category.delete');
Route::get('/category-page-{id}', [CategoryController::class, 'showPage'])->name('category.page');
//////////// End Category All Routes //////////

//////////// Start subCategory All Routes /////////
Route::get('/subcategory-add', [SubCategoryController::class, 'Add'])->name('subcategory.add');
Route::post('/subcategory-add', [SubCategoryController::class, 'Store'])->name('subcategory.store');
Route::get('/subcategory-show', [SubCategoryController::class, 'Show'])->name('subcategory.show');
Route::get('/subcategory-edit-{id}', [SubCategoryController::class, 'Edit'])->name('subcategory.edit');
Route::post('/subcategory-update', [SubCategoryController::class, 'Update'])->name('subcategory.update');
Route::get('/subcategory/delete/{id}', [SubCategoryController::class, 'Delete'])->name('subcategory.delete');
//////////// End Category All Routes //////////

//////////// Start Product All Routes //////////

Route::get('/add2', [ProductController::class, 'Add'])->name('product.add');
Route::get('/zero-{id}', [ProductController::class, 'zero'])->name('product.quentity.zero');
Route::get('/ten-{id}', [ProductController::class, 'lessTen'])->name('product.quentity.ten');
Route::get('/read-notifiction-{id}', [ProductController::class, 'readNotification'])->name('product.read-notification');
Route::get('/addcands', [ProductController::class, 'addcands'])->name('product.addcolorandsize');
Route::post('/product/add', [ProductController::class, 'Store'])->name('product.store');
Route::get('/ajax-{id}', [ProductController::class, 'AjaxShow']);
Route::get('/showp', [ProductController::class, 'Show'])->name('product.show');
Route::get('/product-edit-{id}', [ProductController::class, 'Edit'])->name('product.edit');
Route::post('/product/update', [ProductController::class, 'Update'])->name('product.update');
Route::get('/product/delete/{id}', [ProductController::class, 'Delete'])->name('product.delete');
Route::get('/product-subcategory-{id}', [ProductController::class, 'showSub'])->name('product.show.subcategory');

//////////// End Product All Routes //////////


//////////// Start city All Routes //////////

Route::get('/add-city', [CityController::class, 'Add'])->name('city.add');
Route::get('/add-area', [CityController::class, 'AddArea'])->name('area.add');
Route::post('/city-add', [CityController::class, 'Store'])->name('city.store');
Route::post('/area-add', [CityController::class, 'CityStore'])->name('area.store');
Route::get('/city-show', [CityController::class, 'Show'])->name('city.show');
Route::get('/area-show', [CityController::class, 'ShowArea'])->name('area.show');
Route::get('/edit2-{id}', [CityController::class, 'Edit'])->name('country.edit');
Route::get('/area-edit-{id}', [CityController::class, 'Edit'])->name('city.edit');
Route::get('/area-delete-{id}', [CityController::class, 'Edit'])->name('city.delete');
Route::post('/city-update', [CityController::class, 'Update'])->name('country.update');
Route::get('/city-delete-{id}', [CityController::class, 'Delete'])->name('country.delete');
Route::get('/city-page-{id}', [CityController::class, 'showPage'])->name('city.page');
//////////// End Product All Routes //////////
//////////// Start city All Routes //////////
Route::get('/addnotification', [notificationController::class, 'addnotification'])->name('notification.add');
Route::get('/shownotification', [notificationController::class, 'shownotification'])->name('notification.show');

//////////// End City All Routes //////////
