<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'throttle:60,1'],
    ],
    function () {
        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::post('/register', [HomeController::class, 'register'])->name('register');
        Route::post('/subscribe', [HomeController::class, 'subscribe'])->name('subscribe');
        Route::post('/get-programs', [HomeController::class, 'getPrograms'])->name('get-programs');
        Route::post('/get-article', [HomeController::class, 'getArticle'])->name('get-article');
        Route::post('/archive-year', [HomeController::class, 'archiveYear'])->name('archive-year');
    }
);
