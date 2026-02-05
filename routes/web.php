<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\{ArticleController as UserArticleController, CheckoutController as UserCheckoutController, ContactController as UserContactController, HomeController, ProductController as UserProductController};

// ADMIN CONTROLLERS
use App\Http\Controllers\Admin\{
    DashboardController,
    ProductController,
    GalleryController,
    ClientController,
    EventController,
    ArticleController,
    ContactController,
    OrderController
};

/*
|--------------------------------------------------------------------------
| PUBLIC / USER
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('user.home');

Route::get('/articles/{article}', [UserArticleController::class, 'show'])
    ->name('articles.show');

Route::post('/contact', [UserContactController::class, 'store'])
    ->name('contact.store');

/*
|--------------------------------------------------------------------------
| PRODUCTS (USER)
|--------------------------------------------------------------------------
*/
Route::prefix('products')->name('user.products.')->group(function () {

    // LIST PRODUCT PER CATEGORY
    Route::get('/{slug}', [UserProductController::class, 'index'])
        ->name('index');

    // DETAIL PRODUCT
    Route::get('/{slug}/{id}', [UserProductController::class, 'show'])
        ->name('show');
});


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/
Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('products', ProductController::class)->except(['show']);
        Route::resource('galleries', GalleryController::class);
        Route::resource('clients', ClientController::class);
        Route::resource('events', EventController::class);
        Route::resource('articles', ArticleController::class);
        Route::resource('contacts', ContactController::class)
            ->only(['index', 'show', 'destroy']);
    });

/*
|--------------------------------------------------------------------------
| PROFILE
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
