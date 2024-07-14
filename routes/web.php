<?php

use App\Http\Controllers\Admin\confirmTransactionController as AdminConfirmTransactionController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\confirmTransactionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Region\KotaController;
use App\Http\Controllers\Region\ProvinsiController;
use App\Http\Controllers\User\ProductController as UserProductController;
use App\Http\Controllers\User\TransactionController as UserTransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'frontend'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// routes user
// Route::get('/product', function() {
//     return view('frontend.pages.ProductDetail');
// })->name('product-detail');

Route::controller(UserProductController::class)->group(function () {
    Route::get('user/productDetail/{id}', 'detailProduct')->name('user.product.detail');
});


// user transaction
Route::post('admin/transaction.store', [TransactionController::class, 'store'])->name('admin.transaction.store');


// Route admin
Route::middleware(['auth', 'admin'])->group(function () {
    // direct dashboard
    Route::controller(HomeController::class)->group(function () {
        Route::get('admin/dashboard', 'backend')->name('admin.dashboard');
    });

    Route::controller(SliderController::class)->group(function () {
        Route::get('admin/slider', 'index')->name('admin.slider');
        Route::get('admin/slider/add', 'create')->name('admin.slider.add');
        Route::post('admin/slider/store', 'store')->name('admin.slider.store');
        Route::get('{id}/admin/slider/edit', 'edit')->name('admin.slider.edit');
        Route::put('{id}/admin/slider/update', 'update')->name('admin.slider.update');
        Route::delete('{id}/admin/slider/delete', 'destroy')->name('admin.slider.delete');
    });

    // route product
    Route::controller(ProductController::class)->group(function () {
        Route::get('admin/product', 'index')->name('admin.product');
        Route::get('admin/product/add', 'create')->name('admin.product.add');
        Route::post('admin/product/store', 'store')->name('admin.product.store');
        Route::get('{id}/admin/product/edit', 'edit')->name('admin.product.edit');
        Route::put('{id}/admin/product/update', 'update')->name('admin.product.update');
        Route::delete('{id}/admin/product/delete', 'destroy')->name('admin.product.delete');
    });
    
    // Transaction
    Route::controller(TransactionController::class)->group(function () {
        Route::get('admin/transaction', 'index')->name('admin.transaction');
        // Route::post('admin/transaction/store', 'store')->name('admin.transaction.store');
        Route::get('admin/confirm/transaction', 'confirmTransaction')->name('admin.confirm.transaction');
    });

    // Region
    Route::controller(ProvinsiController::class)->group(function () {
        Route::get('admin/provinces', 'index')->name('admin.provinces');
        Route::get('admin/province/create', 'create')->name('admin.province.create');
        Route::post('admin/province/store', 'store')->name('admin.province.store');
    });

    Route::controller(KotaController::class)->group(function () {
        Route::get('admin/cityes', 'index')->name('admin.cityes');
        Route::get('admin/city/create', 'create')->name('admin.city.create');
        Route::post('admin/city/store', 'store')->name('admin.city.store');
    });
});
