<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ProductController;
use App\Http\Controllers\Front\ProfileController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\wishListController;
use App\Http\Controllers\Auth\SocialLoginController;
use App\Http\Controllers\Payment\PaymentsController;
use App\Http\Controllers\Front\CurrencyConverterController;
use App\Http\Controllers\Front\OrdersController;
use App\Http\Controllers\Front\TwoFactorAuthenticationController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product:slug}', [ProductController::class, 'show'])->name('product.show');


Route::resource('/cart', CartController::class);
Route::resource('wishlist', wishListController::class);

Route::get('checkout', [CheckoutController::class, 'create'])->name('checkout')->middleware(['auth','verified']);

Route::post('checkout', [CheckoutController::class, 'store']);

Route::get('orders/{order}/pay', [PaymentsController::class, 'credit'])->name('orders.payments.credit')->middleware(['auth','verified']);

Route::get('callback', [PaymentsController::class, 'callback']);

Route::get('auth/user/2fa', [TwoFactorAuthenticationController::class, 'index'])->name('front.2fa');

Route::post('currency', [CurrencyConverterController::class, 'store'])->name('currency.store');

Route::middleware(['auth','verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('auth/{provider}/redirect',[SocialLoginController::class,'redirect'])->name('auth.socialite.redirect');
Route::get('auth/{provider}/callback',[SocialLoginController::class,'callback'])->name('auth.socialite.callback');
Route::get('orders/{order}',[OrdersController::class,'show'])->name('orders.show');

// require __DIR__.'/auth.php';
