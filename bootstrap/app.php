<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Http;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->report(function (Exception $e) {

            $response = Http::post('https://api.telegram.org/bot'.env('TELEGRAM_BOT_TOKEN').'/sendMessage', [
                'chat_id' => env('TELEGRAM_DEV_CHAT_ID'),
                'text' => $e->getMessage(),
            ]);
        });
    })->create();
