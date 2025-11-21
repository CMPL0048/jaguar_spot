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
        // Obtener idioma de: sesión -> cookie -> config default
        // (localStorage será guardado en cookie por el controlador)
        $language = session('app_language')
                 ?? request()->cookie('app_language')
                 ?? config('app.locale', 'es');

        // Validar que sea un idioma soportado
        if (!in_array($language, ['es', 'en'])) {
            $language = 'es';
        }

        // Establecer el locale de la aplicación
        app()->setLocale($language);

        // Pasar al siguiente middleware/controller
        return $next($request);
    }
}
