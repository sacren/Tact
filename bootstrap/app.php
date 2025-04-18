<?php

use App\Http\Middleware\AddColor;
use App\Http\Middleware\AssignRequestId;
use App\Http\Middleware\CheckUserRole;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        return $middleware->alias([
            'role' => CheckUserRole::class,
            'assign' => AssignRequestId::class,
            'color' => AddColor::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        return $exceptions;
    })->create();
