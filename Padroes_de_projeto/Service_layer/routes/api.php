<?php

use Illuminate\Routing\Route;
use App\Http\Controllers\UserController;

Route::post('/user/register', [UserController::class, 'store']);