<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

$app =  Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
         return [
            // 🔽 Add your global middlewares here
            \App\Http\Middleware\SetLocale::class,
        ];
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
return $app;
