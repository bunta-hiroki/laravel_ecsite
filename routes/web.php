<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\User\ItemController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\Owner\BlogController;
use App\Http\Controllers\Owner\ProductController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\TopPageController;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Support\Facades\DB;
use App\Models\PrimaryCategory;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use App\jobs\SendThanksMail;
use App\Models\User;
use App\Models\Owner;
use App\Models\Blog;
use Illuminate\Database\Eloquent\Model;
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


    // ゲストユーザー画面
    Route::get('/', [TopPageController::class, 'index'])->name('index');
    Route::get('show/{item}', [ProductController::class, 'show'])->name('items.show');
    
    Route::get('blog/showall', [BlogController::class, 'showall'])->name('blogs.showall');  //メソッドのshowとshowallの名前が似ていたため並び順によっては表示されない
    Route::get('blog/{id}', [BlogController::class, 'show'])->name('blogs.show');


    // ログインユーザー画面
    Route::get('user/dashboard', [ItemController::class, 'index'])->name('items.index');

    // いいね機能画面、ログインユーザーのみ
    Route::post('user/{id}/favorites', [FavoriteController::class, 'store'])->name('favorites');
    Route::post('user/{id}/unfavorites', [FavoriteController::class, 'destroy'])->name('favorites.destroy');

    // いいねアイテム一覧表示画面
    Route::get('favoriteitems', [FavoriteController::class, 'index'])->name('favorites.favoriteitems');

    // カート->stripe決済画面
    Route::prefix('cart')->middleware('auth:users')->group(function() {
        Route::get('/', [CartController::class, 'index'])->name('cart.index');
        Route::post('add', [CartController::class, 'add'])->name('cart.add');
        Route::post('delete/{item}', [CartController::class, 'delete'])->name('cart.delete');
        Route::get('checkout', [CartController::class, 'checkout'])->name('cart.checkout');
        Route::get('success', [CartController::class, 'success'])->name('cart.success');
        Route::get('cancel', [CartController::class, 'cancel'])->name('cart.cancel');
    });
    
    
    require __DIR__.'/auth.php';
    
    

