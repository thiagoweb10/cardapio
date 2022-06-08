<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CollaboratorController;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){
    // Colaboradores
    Route::resource('collaborators', CollaboratorController::class)
    ->parameters(['collaborators' => 'user'])
    ->except('show');

    Route::resource('clients', ClientController::class)
    ->parameters(['clients' => 'client'])
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