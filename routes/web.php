<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BlogController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('product', [ProductController::class, 'product'])->name('product');
Route::post('add/product', [ProductController::class, 'addProduct'])->name('addproduct');
Route::post('update/product', [ProductController::class, 'updateProduct'])->name('product.update');
Route::post('delete/product', [ProductController::class, 'deleteProduct'])->name('delete.product');
Route::get('product/pagination', [ProductController::class, 'ProductPagination'])->name('product.pagination');
Route::get('product/search', [ProductController::class, 'ProductSearch'])->name('product.search');

Route::get('blog/img', [BlogController::class, 'blog'])->name('blog');
Route::post('blog/post', [BlogController::class, 'blogPost'])->name('blogpost');
Route::get('blog/delete', [BlogController::class, 'blogDelete'])->name('blog.delete');
Route::post('blog/update', [BlogController::class, 'blogUpdate'])->name('blogupdate');
Route::get('pagination/paginate-data', [BlogController::class, 'pagination'])->name('pagination.info');
Route::get('blog/search', [BlogController::class, 'blogSearch'])->name('blog.search');
// Route::get('/', [FrontendController::class, 'home'])->name('tohoney_home');
