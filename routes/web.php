<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AppController::class, 'home']);
Route::get('/ads/{id}', fn (int $id) => gettype($id));
