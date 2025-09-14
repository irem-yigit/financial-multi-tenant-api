<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

//Login endpoint
Route::post('/login', [AuthController::class, 'login']);

// Passport default routes
require base_path('vendor/laravel/passport/routes/web.php');

