<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PromotionController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/* Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
 */

Route::get('/', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');



//###########################################___VERTICALLEE____###########################################################
Route::get('/promotion_image_verticale/{productName}/{productMark}/{productQte}/{decimalPrice}/{fractionalPrice}/{decimalOldPrice}/{fractionalOldPrice}', function ($productName, $productMark, $productQte, $decimalPrice, $fractionalPrice, $decimalOldPrice, $fractionalOldPrice) {
    return view('verticale/promotion_image_verticale', [
        'product_name' => $productName,
        'product_mark' => $productMark,
        'product_qte' => $productQte,
        'decimal_price' => $decimalPrice,
        'fractional_price' => $fractionalPrice,
        'decimal_old_price' => $decimalOldPrice,
        'fractional_old_price' => $fractionalOldPrice,

    ]);
});
Route::get('/promotion_image_verticale_with_percentage/{productName}/{productMark}/{productQte}/{decimalPrice}/{fractionalPrice}/{decimalOldPrice}/{fractionalOldPrice}/{percentage}', function ($productName, $productMark, $productQte, $decimalPrice, $fractionalPrice, $decimalOldPrice, $fractionalOldPrice, $percentage) {
    return view('verticale/promotion_image_verticale_with_percentage', [
        'product_name' => $productName,
        'product_mark' => $productMark,
        'product_qte' => $productQte,
        'decimal_price' => $decimalPrice,
        'fractional_price' => $fractionalPrice,
        'decimal_old_price' => $decimalOldPrice,
        'fractional_old_price' => $fractionalOldPrice,
        'percentage' => $percentage,

    ]);
});
Route::get('/promotion_image_verticale_with_lots/{productName}/{productMark}/{productQte}/{decimalPrice}/{fractionalPrice}/{decimalOldPrice}/{fractionalOldPrice}/{lots}', function ($productName, $productMark, $productQte, $decimalPrice, $fractionalPrice, $decimalOldPrice, $fractionalOldPrice, $lots) {
    return view('verticale/promotion_image_verticale_with_lots', [
        'product_name' => $productName,
        'product_mark' => $productMark,
        'product_qte' => $productQte,
        'decimal_price' => $decimalPrice,
        'fractional_price' => $fractionalPrice,
        'decimal_old_price' => $decimalOldPrice,
        'fractional_old_price' => $fractionalOldPrice,
        'lots' => $lots,

    ]);
});
Route::get('/promotion_image_verticale_with_gratuite/{productName}/{productMark}/{productQte}/{decimalPrice}/{fractionalPrice}/{decimalOldPrice}/{fractionalOldPrice}/{free}', function ($productName, $productMark, $productQte, $decimalPrice, $fractionalPrice, $decimalOldPrice, $fractionalOldPrice, $free) {
    return view('verticale/promotion_image_verticale_with_gratuite', [
        'product_name' => $productName,
        'product_mark' => $productMark,
        'product_qte' => $productQte,
        'decimal_price' => $decimalPrice,
        'fractional_price' => $fractionalPrice,
        'decimal_old_price' => $decimalOldPrice,
        'fractional_old_price' => $fractionalOldPrice,
        'free' => $free,

    ]);
});


//######################################################______HORIZONATLEE_____###############################################################
Route::get('/promotion_image_horizontale/{productName}/{productMark}/{productQte}/{decimalPrice}/{fractionalPrice}/{decimalOldPrice}/{fractionalOldPrice}', function ($productName, $productMark, $productQte, $decimalPrice, $fractionalPrice, $decimalOldPrice, $fractionalOldPrice) {
    return view('horizontale/promotion_image_horizontale', [
        'product_name' => $productName,
        'product_mark' => $productMark,
        'product_qte' => $productQte,
        'decimal_price' => $decimalPrice,
        'fractional_price' => $fractionalPrice,
        'decimal_old_price' => $decimalOldPrice,
        'fractional_old_price' => $fractionalOldPrice,

    ]);
});
Route::get('/promotion_image_horizontale_with_percentage/{productName}/{productMark}/{productQte}/{decimalPrice}/{fractionalPrice}/{decimalOldPrice}/{fractionalOldPrice}/{percentage}', function ($productName, $productMark, $productQte, $decimalPrice, $fractionalPrice, $decimalOldPrice, $fractionalOldPrice, $percentage) {
    return view('horizontale/promotion_image_horizontale_with_percentage', [
        'product_name' => $productName,
        'product_mark' => $productMark,
        'product_qte' => $productQte,
        'decimal_price' => $decimalPrice,
        'fractional_price' => $fractionalPrice,
        'decimal_old_price' => $decimalOldPrice,
        'fractional_old_price' => $fractionalOldPrice,
        'percentage' => $percentage,

    ]);
});
Route::get('/promotion_image_horizontale_with_lots/{productName}/{productMark}/{productQte}/{decimalPrice}/{fractionalPrice}/{decimalOldPrice}/{fractionalOldPrice}/{lots}', function ($productName, $productMark, $productQte, $decimalPrice, $fractionalPrice, $decimalOldPrice, $fractionalOldPrice, $lots) {
    return view('horizontale/promotion_image_horizontale_with_lots', [
        'product_name' => $productName,
        'product_mark' => $productMark,
        'product_qte' => $productQte,
        'decimal_price' => $decimalPrice,
        'fractional_price' => $fractionalPrice,
        'decimal_old_price' => $decimalOldPrice,
        'fractional_old_price' => $fractionalOldPrice,
        'lots' => $lots,

    ]);
});
Route::get('/promotion_image_horizontale_with_gratuite/{productName}/{productMark}/{productQte}/{decimalPrice}/{fractionalPrice}/{decimalOldPrice}/{fractionalOldPrice}/{free}', function ($productName, $productMark, $productQte, $decimalPrice, $fractionalPrice, $decimalOldPrice, $fractionalOldPrice, $free) {
    return view('horizontale/promotion_image_horizontale_with_gratuite', [
        'product_name' => $productName,
        'product_mark' => $productMark,
        'product_qte' => $productQte,
        'decimal_price' => $decimalPrice,
        'fractional_price' => $fractionalPrice,
        'decimal_old_price' => $decimalOldPrice,
        'fractional_old_price' => $fractionalOldPrice,
        'free' => $free,

    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');


Route::post('/promotion/generate-image', [PromotionController::class, 'generatePromotionImage'])->name('generatePromotionImage');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
