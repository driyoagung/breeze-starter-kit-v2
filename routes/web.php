<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoreController;
use App\Http\Middleware\HasRoleAdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', DashboardController::class)->name('dashboard');
Route::get('/home', [HomeController::class, 'index'])->middleware(['auth',])->name('home');

Route::get('stores', [StoreController::class, 'index'])->name('stores.index');
Route::get('stores/{store:slug}/products/{product:slug}', [ProductController::class, 'show'])->name('products.show');

Route::middleware('auth')->group(function () {
    Route::middleware(HasRoleAdminMiddleware::class)->group(function () {
        Route::get('stores/list', [StoreController::class, 'list'])->name('stores.list');
        Route::put('stores/approve/{store}', [StoreController::class, 'approve'])->name('stores.approve');
    });
    Route::resource('stores.products', ProductController::class)->except('show');
    Route::middleware('verified')->group(function () {
        Route::get('stores/mine', [StoreController::class, 'mine'])->name('stores.mine');

        Route::resource('stores', StoreController::class)->except('index', 'show');

    });


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('stores/{store:slug}', [StoreController::class, 'show'])->name('stores.show');


require __DIR__ . '/auth.php';
