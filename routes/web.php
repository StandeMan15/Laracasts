<?php

use App\Http\Controllers\ProductsController;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductsController::class, 'index'])->name('home');

Route::get('products/{product:slug}', [ProductsController::class, 'show']);
//Route::get('/{product:category:slug}', [CategoryController::class, 'show']);

Route::get('/{category:slug}', function (Category $category){
    return view('products', [
        'products' => $category->products,
        'currentCategory' => $category,
        'categories' => Category::all()
    ]);
})->name('category');

Route::get('authors/{author:username}', function (User $author){
    return view('products', [
        'products' => $author->products,
        'categories' => Category::all()
    ]);
});