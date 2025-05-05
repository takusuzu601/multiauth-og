<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        // リクエストルートが admin.* なら admin.login に、それ以外なら user.login にリダイレクト
        $middleware->redirectGuestsTo(function (Request $request) {

            return $request->routeIs('admin.*')
                ? route('admin.login')
                : route('user.login');
        });

        $middleware->alias([
            'verified' => \App\Http\Middleware\CustomEnsureEmailIsVerified::class,
            // 追加
            'guest' => \App\Http\Middleware\CustomRedirectIfAuthenticated::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
