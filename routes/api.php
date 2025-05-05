<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CharacterController;

Route::apiResource('movies', MovieController::class);
Route::apiResource('characters', CharacterController::class);
