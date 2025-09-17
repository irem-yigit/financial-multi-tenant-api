<?php

declare(strict_types=1);

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByRequestData;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
*/

Route::middleware([
    'web',
    'auth:api', // Passport token ile login kontrolü
    PreventAccessFromCentralDomains::class,
    InitializeTenancyByRequestData::class . ':tenant_id', // token veya request param üzerinden tenant_id alır
])->group(function () {

    Route::get('/', function () {
        return response()->json([
            'message' => 'This is your multi-tenant application.',
            'current_tenant_id' => tenant('id'),
        ]);
    });
    //Route::post('/login', [AuthController::class, 'login']);

});
