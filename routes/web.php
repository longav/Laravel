<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\User\ProductController;
use App\Http\Middleware\CheckLogin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|

*/

Route::get('/', [ProductController::class, 'index']);
Route::get('register', [DashboardController::class, 'showRegistrationForm'])->name('register_view');
Route::post('register', [DashboardController::class, 'register'])->name('register');
Route::get('login_view', [DashboardController::class, 'index'])->name('login_view');
Route::post('postlogin', [DashboardController::class, 'Login'])->name('postlogin');

Route::get('logout', [DashboardController::class, 'logout'])->name('logout');



Route::middleware(['auth', CheckLogin::class])->prefix('admin/')
    ->group(
        function () {
            Route::prefix('products/')->group(function () {
                Route::get('list-product', [AdminProductController::class, 'index'])->name('list-product');

                Route::get('create', [AdminProductController::class, 'Create'])->name('products.create');
                Route::post('store', [AdminProductController::class, 'Store'])->name('products.store');
                Route::get('edit/{id}', [AdminProductController::class, 'Edit'])->name('products.edit');
                Route::put('update/{id}', [AdminProductController::class, 'Update'])->name('products.update');
                Route::delete('delete,{id}', [AdminProductController::class, 'Delete'])->name('products.delete');
            });

            Route::prefix('category/') -> group(function(){
                Route::get('list-category',[CategoryController::class,'index']) -> name('category.list-category');
                Route::get('Create',[CategoryController::class,'Create']) -> name('category.create'); 
                Route::post('Create',[CategoryController::class,'Store']) -> name('category.store'); 
                Route::delete('delete,{id}',[CategoryController::class,'Delete']) -> name('category.delete');
                Route::get('edit,{id}',[CategoryController::class,'Edit']) -> name('category.edit');
                Route::put('update/{id}', [CategoryController::class, 'Update'])->name('category.update');
            });

            Route::prefix('user/') -> group(function(){
                Route::get('list-category',[UserController::class,'index']) -> name('user.list-user');
              
              
                Route::post('ban,{id}',[UserController::class,'Ban']) -> name('user.ban');
                // Route::get('edit,{id}',[UserController::class,'Edit']) -> name('user.edit');
            });

            Route::prefix('oder') -> group(function(){
                Route::get('oder.list-user',[OderController::class,'index']) -> name('oder.list-user');
            });

        }
    );



Route::prefix('user')->group(function () {

    Route::get('products/detail/{id}', [ProductController::class, 'detail'])->name('detail');
    Route::get('products/category', [ProductController::class, 'list'])->name('list_cate');
    Route::get('products/list/{id}', [ProductController::class, 'list_product'])->name('list_product');
    Route::post('products/search', [ProductController::class, 'search'])->name('search');
    Route::post('products/add_cart/{id}', [ProductController::class, 'add_cart'])->name('add_cart');
    Route::get('products/cart', [ProductController::class, 'cart'])->name('cart');
    Route::get('products/detroy/{id}', [ProductController::class, 'Detroy_PrCart'])->name('detroy');
    Route::post('products/oder', [ProductController::class, 'Oder'])->name('oder');
    Route::get('products/oder', [ProductController::class, 'Oder_view'])->name('oder_view');
    Route::post('products/add_oder', [ProductController::class, 'Add_oder'])->name('add_oder');
});
