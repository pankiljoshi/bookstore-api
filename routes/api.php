<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageViewController;
use App\Http\Controllers\Shopify\BookController;
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

Route::prefix('shopify')->group(function () {
    Route::prefix('books')->group(function () {
        Route::get('/{id}', [BookController::class, 'retrive'])->name('api.shopify.books.retrive');
        Route::post('/{id}', [BookController::class, 'saveMeta'])->name('api.shopify.books.save_meta');
        Route::get('', [BookController::class, 'list'])->name('api.shopify.books.list');
    });
});

Route::post('/page-views', [PageViewController::class, 'save'])->name('api.page_views.save');