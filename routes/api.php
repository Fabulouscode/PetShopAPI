<?php

use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Category\DeleteCategoryController;
use App\Http\Controllers\Category\GetCategoryController;
use App\Http\Controllers\Category\ShowCategoryController;
use App\Http\Controllers\Category\StoreCategoryController;
use App\Http\Controllers\Category\UpdateCategoryController;
use App\Http\Controllers\OrderStatus\DeleteOrderStatusController;
use App\Http\Controllers\OrderStatus\GetOrderStatusController;
use App\Http\Controllers\OrderStatus\ShowOrderStatusController;
use App\Http\Controllers\OrderStatus\StoreOrderStatusController;
use App\Http\Controllers\OrderStatus\UpdateOrderStatusController;
use App\Http\Controllers\Product\DeleteProductController;
use App\Http\Controllers\Product\GetProductController;
use App\Http\Controllers\Product\ShowProductController;
use App\Http\Controllers\Product\StoreProductController;
use App\Http\Controllers\Product\UpdateProductController;
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

Route::group(['middleware' => ['XSSAttackPrevent']],static function () {
    Route::prefix('/v1/user')->name('user.')->group(static function () {
        Route::post('/create', [RegisterController::class, 'register'])->name('register');
        Route::post('/login', [LoginController::class, 'login'])->name('login');
        Route::post('/forget-password', [ForgetPasswordController::class, 'forgetPassword'])->name('forget_password');
        Route::post('/reset-password-token', [ResetPasswordController::class, 'resetPassword'])->name('reset_password');

        Route::group(['middleware' => ['jwt.auth', 'is_user']], static function () {
            Route::get('/', [ProfileController::class, 'profile'])->name('profile');
            Route::delete('/', [DeleteUserController::class, 'delete'])->name('delete');
            Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
            Route::put('/edit', [EditProfileController::class, 'update'])->name('update');
        });
       
    });
});

 /**===== CATEGORY =====***/
 Route::prefix('v1')->name('categories.')->group(static function () {
     Route::get('/categories', [GetCategoryController::class, 'index'])->name('index');
     Route::post('/create',[StoreCategoryController::class, 'store'])->name('store');
     Route::get('/category/{uuid}',[ShowCategoryController::class, 'show'])->name('show');
     Route::put('/category/{uuid}',[UpdateCategoryController::class,'update'])->name('update');
     Route::delete('/{category/{uuid}',[DeleteCategoryController::class, 'destroy'])->name('destroy');
 });
 
 /**===== PRODUCT =====***/
 Route::prefix('v1')->name('products.')->group(static function () {
     Route::get('/products', [GetProductController::class, 'index'])->name('index');
     Route::post('/create',[StoreProductController::class, 'store'])->name('store');
     Route::get('/product/{uuid}',[ShowProductController::class, 'show'])->name('show');
     Route::put('/product/{uuid}',[UpdateProductController::class, 'update'])->name('update');
     Route::delete('/product/{uuid}',[DeleteProductController::class, 'destroy'])->name('destroy');
 });

 /**===== ORDER STATUS =====***/
 Route::prefix('v1')->name('order-status.')->group(static function () {
     Route::get('/order-status', [GetOrderStatusController::class, 'index'])->name('index');
     Route::post('/create', [StoreOrderStatusController::class, 'store'])->name('store');
     Route::get('/order-status/{uuid}', [ShowOrderStatusController::class, 'show'])->name('show');
     Route::put('/order-status/{uuid}', [UpdateOrderStatusController::class, 'update'])->name('update');
     Route::delete('/order-status/{uuid}', [DeleteOrderStatusController::class, 'destroy'])->name('destroy');
 });
