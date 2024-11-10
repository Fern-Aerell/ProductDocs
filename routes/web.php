<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return redirect('/home');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/home/{product}', [HomeController::class, 'index2'])->name('home.view.product');

Route::get('/home/{product}/{feature}', [HomeController::class, 'index3'])->name('home.view.product.feature');
