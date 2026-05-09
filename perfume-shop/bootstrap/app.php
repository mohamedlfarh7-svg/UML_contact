<?php

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
        // تسجيل الـ Admin Middleware
        $middleware->alias([
            'admin' => \App\Http\Middleware\AdminMiddleware::class,
        ]);

        // تحديد فين يمشي المستخدم (Redirect)
        $middleware->redirectTo(
            guests: '/login', // إلا ماكانش مسجل دخول وباغي يدخل لصفحة محمية
            users: '/',      // أي واحد دار Login يصيفطو للـ Landing Page أوتوماتيكياً
        );
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();