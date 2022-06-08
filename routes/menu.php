<?php

use App\Http\Controllers\Cardapio\HomeController;
use App\Http\Controllers\Cardapio\SearchController;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'menu.'], function() {
    Route::get('pesquisar/', [SearchController::class,'index'])->name('search');
    Route::get('pesquisar/produto/{product}', [SearchController::class,'findProduct'])->name('search.product');

    Route::get('cart/', [HomeController::class,'cart'])->name('cart');
    Route::get('cart/add/{product}', [HomeController::class,'addCart'])->name('cart.add');
    Route::get('cart/remove/{index}', [HomeController::class,'removeCart'])->name('cart.remove');
    Route::post('cart/checkout', [HomeController::class,'checkout'])->name('cart.checkout');
});