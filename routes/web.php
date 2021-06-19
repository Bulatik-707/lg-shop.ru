<?php

use App\Http\Controllers\BasketController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\mailController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/catalog/{catalog}', [CatalogController::class, 'show2'])->name('catalog-one.show');

Route::get('/catalog/products/{product_id}',[ProductController::class,'productsForCatalog'])->name('products_cat');

Route::get('/catalog/product/{product_id}',[ProductController::class,'product'])->name('product_id');

Route::get('/home', [CatalogController::class, 'index'])->name('cat_home');

Route::get('/products',[ProductController::class,'products'])->name('products');

Route::get('/catalogs', [CatalogController::class, 'catalogs'])->name('catalogs');

Route::post('catalog/product/basket/add-to-basket', [BasketController::class, 'addToBasket'])->name('addToBasket');

Route::get('product-add-to-basket/{id}',[BasketController::class,'getAddToBasket'])->name('add');

Route::get('/basket/increase{id}', [BasketController::class, 'getIncreaseByOne'])->name('increaseByOne'); 
Route::get('/basket/reduce{id}', [BasketController::class, 'getReduceByOne'])->name('reduceByOne'); 
Route::get('/basket/remove{id}', [BasketController::class, 'getRemoveItem'])->name('remove'); 

Route::get('/basket', [BasketController::class, 'getBasket'])->name('basket');

Route::get('/basket/order', [BasketController::class, 'getOrder'])->name('order');
Route::post('/basket/order', [BasketController::class, 'postOrder'])->name('order');

Route::get('/delivery', [HomeController::class, 'delivery'])->name('delivery');
Route::get('/price', [HomeController::class, 'price'])->name('price');

Route::get('/contacts', [HomeController::class, 'contacts'])->name('contacts');
Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::get('/privacy', [HomeController::class, 'privacy'])->name('privacy');

Route::get('/mail', [mailController::class, 'send']);
Auth::routes();
Route::middleware(['role:admin'])->prefix('admin_panel')->group(function(){
    
    Route::get('/', [HomeController::class, 'index'])->name('homeAdmin');
    Route::get('ap_index', [HomeController::class, 'ap_index'])->name('ap_index');
    Route::get('order/{id}/full', [OrderController::class, 'full'])->name('order.full');
    Route::get('product/{id}/full', [OrderController::class, 'full'])->name('product.full');
    Route::resource('color', ColorController::class);
    Route::resource('catalog', CatalogController::class);
    Route::resource('product', ProductController::class);
    Route::resource('order', OrderController::class);
});
