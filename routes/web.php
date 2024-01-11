<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Auth\GoogleProviderController;
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

Route::get('/', [FrontendController::class, 'index'])->name('home');
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
