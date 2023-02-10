<?php

use Tcoders\TokenLogin\Http\Controllers\TokenController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web']], function() {
    Route::get(config('cross_domain.webhook_url'), [TokenController::class, 'authenticate']);
    Route::get('sso-enabled', [TokenController::class, 'enabled']);
});