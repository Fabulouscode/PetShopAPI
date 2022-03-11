<?php

use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\OrderStatus\OrderStatusController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\User\DeleteUserController;
use App\Http\Controllers\User\EditProfileController;
use App\Http\Controllers\User\ProfileController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['XSSAttackPrevent']], function () {
    Route::prefix('/v1/user')->name('user.')->group(function () {
        Route::post('/create', [RegisterController::class, 'register'])->name('register');
        Route::post('/login', [LoginController::class, 'login'])->name('login');
        Route::post('/forget-password', [ForgetPasswordController::class, 'forgetPassword'])->name('forget_password');
        Route::post('/reset-password-token', [ResetPasswordController::class, 'resetPassword'])->name('reset_password');

        Route::group(['middleware' => ['jwt.auth', 'is_user']], function () {
            Route::get('/', [ProfileController::class, 'profile'])->name('profile');
            Route::delete('/', [DeleteUserController::class, 'delete'])->name('delete');
            Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
            Route::put('/edit', [EditProfileController::class, 'update'])->name('update');
        });
       
    });
});

 /**===== CATEGORY =====***/
 Route::prefix('categories')
 ->name('categories.')
 ->controller(CategoryController::class)
 ->group(static function () {
     Route::get('/', 'index')->name('index');
     Route::post('/', 'store')->name('store');
     Route::get('/{category}', 'show')->name('show');
     Route::put('/{category}', 'update')->name('update');
     Route::delete('/{category}', 'destroy')->name('destroy');
 });

 /**===== PRODUCT =====***/
 Route::prefix('products')
 ->name('products.')
 ->controller(ProductController::class)
 ->group(static function () {
     Route::get('/', 'index')->name('index');
     Route::post('/', 'store')->name('store');
     Route::get('/{product}', 'show')->name('show');
     Route::put('/{product}', 'update')->name('update');
     Route::delete('/{product}', 'destroy')->name('destroy');
 });

 /**===== ORDER STATUS =====***/
 Route::prefix('order-status')
 ->name('order-status.')
 ->controller(OrderStatusController::class)
 ->group(static function () {
     Route::get('/', 'index')->name('index');
     Route::post('/', 'store')->name('store');
     Route::get('/{orderStatus}', 'show')->name('show');
     Route::put('/{orderStatus}', 'update')->name('update');
     Route::delete('/{orderStatus}', 'destroy')->name('destroy');
 });
