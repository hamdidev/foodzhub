<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductGalleryController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\WhyChooseUsController;
use App\Models\ProductGallery;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('logout', [AdminDashboardController::class, 'logout'])->name('logout');
    Route::get('profile', [AdminDashboardController::class, 'AdminProfile'])->name('profile');
    Route::get('password-change', [AdminDashboardController::class, 'AdminPasswordChange'])->name('password');
    Route::post('profile-update', [AdminDashboardController::class, 'AdminProfileUpdate'])->name('profile.store');
    Route::post('change-password', [AdminDashboardController::class, 'AdminChangePassword'])->name('change.password');
    // Slider routes
    Route::resource('slider', SliderController::class);
    // WhyChooseUs routes
    Route::put('why-choose-title-update', [WhyChooseUsController::class, 'updateTitle'])->name('why-choose-title.update');
    Route::resource('why-choose-us', WhyChooseUsController::class);
    // Category routes
    Route::resource('category', CategoryController::class);
    // Product routes
    Route::resource('product', ProductController::class);
    // Product Gallery routes
    Route::get('product-gallery/{product}', [ProductGalleryController::class, 'index'])->name('product-gallery.show-index');

    Route::resource('product-gallery', ProductGalleryController::class);
});
