<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLanguageFromSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Obtener idioma de sesión o cookie
        $language = session('app_language')
                 ?? request()->cookie('app_language')
                 ?? config('app.locale', 'es');

        // Establecer el locale de la app
        app()->setLocale($language);

        // Pasar al siguiente middleware/controller
        return $next($request);
    }
}
