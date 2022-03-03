<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CollaboratorController;
use App\Http\Controllers\Admin\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){
    // Colaboradores
    Route::resource('collaborators', CollaboratorController::class)
    ->parameters(['collaborators' => 'user'])
    ->except('show');

    // Categorias
    Route::resource('categories', CategoryController::class)
    ->parameters(['categories' => 'category'])
    ->except('show');

    // Produtos
    Route::resource('products', ProductController::class)
    ->parameters(['products' => 'product'])
    ->except('show');
});