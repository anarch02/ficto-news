<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->segment(1); // Первый сегмент URL как язык

        if (in_array($locale, ['en', 'ru', 'uz'])) { // список поддерживаемых языков
            app()->setLocale($locale);
            session()->put('language', $locale);
        } else {
            $locale = session('language', 'en');
            app()->setLocale($locale);
        }

        return $next($request);
    }
}
