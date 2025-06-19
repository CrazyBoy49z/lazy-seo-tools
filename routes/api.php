<?php

use Illuminate\Support\Facades\Route;
use Step2dev\LazySeoTools\Http\Controllers\Api\SeoApiController;

Route::prefix('seo')->group(function () {
    Route::get('/', [SeoApiController::class, 'index']);
    Route::get('/{id}', [SeoApiController::class, 'show']);
    Route::post('/', [SeoApiController::class, 'store']);
    Route::put('/{id}', [SeoApiController::class, 'update']);
    Route::delete('/{id}', [SeoApiController::class, 'destroy']);
});
