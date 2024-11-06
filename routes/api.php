<?php

use App\Http\Controllers\Api\AdApiController;
use App\Http\Controllers\Api\BranchApiController;
use App\Http\Controllers\Api\StatusApiController;
use App\Http\Controllers\Api\UserApiController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

Route::post('/tokens/create', function (Request $request) {

    $user = User::query()->create([
        'name'     => $request->name,
        'phone'    => $request->phone,
        'password' => Hash::make($request->password)
    ]);

    $token = $user->createToken('user')->plainTextToken;

    return ['token' => $token];
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/users',  UserApiController::class);

Route::apiResource('/branches', BranchApiController::class);

Route::apiResource('/statuses', StatusApiController::class);

Route::apiResource('/ads', AdApiController::class);
