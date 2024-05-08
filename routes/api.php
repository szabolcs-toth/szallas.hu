<?php

use App\Http\Controllers\CompaniesController;
use Illuminate\Support\Facades\Route;

Route::prefix('companies')->group(function () {
    Route::get('/', [CompaniesController::class, 'index']);
    Route::post('/', [CompaniesController::class, 'store']);
    Route::patch('/', [CompaniesController::class, 'update']);
});
