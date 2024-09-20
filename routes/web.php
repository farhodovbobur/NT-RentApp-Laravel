<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\BranchController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AppController::class, 'home']);

Route::resource('ads', AdController::class);

Route::resource('branches', BranchController::class);

