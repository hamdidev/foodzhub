<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Auth\GoogleProviderController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\UserProfileController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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


Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::put('update-profile', [UserProfileController::class, 'UserProfileUpdate'])->name('user.profile.update');
    Route::post('update-avatar', [UserProfileController::class, 'UserAvatarUpdate'])->name('user.avatar.update');
    Route::put('change-password', [UserProfileController::class, 'ChangePassword'])->name('user.change.password');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');



require __DIR__ . '/auth.php';


Route::get('/auth/{provider}/redirect', [GoogleProviderController::class, 'redirect']);
Route::get('/auth/{provider}/callback', [GoogleProviderController::class, 'callback']);


Route::group(['middleware' => 'guest'], function () {
    Route::get('/admin/login', [AdminDashboardController::class, 'AdminLogin'])->name('admin.login');
});

// Frontend Routes

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/product/{slug}', [FrontendController::class, 'showProduct'])->name('product.show');

// Product modal route
Route::get('/load-product-modal/{productId}', [FrontendController::class, 'loadProductModal'])->name('load-product-modal');

Route::post('/add-to-cart', [CartController::class, 'AddToCart'])->name('add-to-cart');
Route::get('/get-cart-products', [CartController::class, 'getCartProducts'])->name('get-cart-products');
Route::get('/remove-cart-product\{rowId}', [CartController::class, 'removeCartProduct'])->name('remove-cart-product');

// Cart routes
Route::get('cart', [CartController::class, 'index'])->name('cart.index');
Route::post('cart-update-quantity', [CartController::class, 'cartQtyUpdate'])->name('cart.update-quantity');
Route::get('cart-destroy', [CartController::class, 'cartDestroy'])->name('cart.destroy');
