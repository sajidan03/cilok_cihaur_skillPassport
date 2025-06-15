<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use App\Models\Category;

Route::get('/', [BerandaController::class, 'index']);

Route::get('/home', [BerandaController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/product', [ProdukController::class, 'index']);
Route::get('/product/detail/{id}', [ProdukController::class, 'detail'])->name('product.detail');
Route::get('/product/delete/{id}', [ProdukController::class, 'delete'])->name('product.delete');
Route::get('/login', [UserController::class, 'member'])->name('member.login');
Route::get('/administrator/login', [UserController::class, 'index'])->name('admin.login');
Route::post('/administrator/auth', [UserController::class, 'auth'])->name('admin.auth');
Route::post('/auth', [UserController::class, 'login'])->name('auth');
Route::post('/daftar', [DaftarController::class, 'daftar'])->name('daftar');
Route::get('/daftar', [DaftarController::class, 'display'])->name('daftar');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::middleware(['member'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::get('/cart/{id}', [CartController::class, 'store'])->name('cart.store');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::get('/payment/{id}', [InvoiceController::class, 'payment'])->name('invoice.payment');
    Route::post('/payment/{id}', [InvoiceController::class, 'confirm'])->name('invoice.confirm');
    Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoice.index');
    Route::get('/member/logout', [UserController::class, 'logoutMember'])->name('member.logout');
});
Route::middleware(['admin'])->group(function () {
    Route::get('/administrator', [AdminController::class, 'index']);
    Route::get('/administrator/product', [AdminController::class, 'product']);
    Route::get('/administrator/product/create', [ProdukController::class, 'create'])->name('product-create');
    Route::post('/administrator/product/create', [ProdukController::class, 'store'])->name('product-store');
    Route::get('/administrator/product/edit/{id}', [ProdukController::class, 'edit'])->name('product.edit');
    Route::post('/administrator/product/edit/{id}', [ProdukController::class, 'update'])->name('product.update');

    Route::get('/administrator/category', [AdminController::class, 'category'])->name('admin.category');
    Route::post('/administrator/category', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/administrator/category/edit/{id}', [AdminController::class, 'category'])->name('admin.category.edit');
    Route::get('/administrator/category/delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');
    Route::post('/administrator/category/edit/{id}', [CategoryController::class, 'update'])->name('admin.category.update');

    Route::get('/administrator/member', [AdminController::class, 'member'])->name('admin.member');
    Route::get('/administrator/member/create', [MemberController::class, 'create'])->name('admin.member.create');
    Route::post('/administrator/member/create', [MemberController::class, 'store'])->name('admin.member.store');
    Route::get('/administrator/member/update/{id}', [MemberController::class, 'displayedit'])->name('admin.member.edit');
    Route::post('/administrator/member/update/{id}', [MemberController::class, 'edit'])->name('admin.member.edit');
    Route::post('/administrator/member/hapus/{id}', [MemberController::class, 'hapus'])->name('admin.member.hapus');

    Route::get('/administrator/invoices', [InvoiceController::class, 'index'])->name('admin.invoice.index');
    Route::post('/administrator/invoices/{id}', [InvoiceController::class, 'update'])->name('admin.invoice.update');
});
