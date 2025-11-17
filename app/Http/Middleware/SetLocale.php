<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Verificar si el usuario pasó un parámetro de idioma en la URL
        if ($request->has('lang')) {
            $lang = $request->query('lang');

            // Validar que el idioma sea soportado
            if (in_array($lang, ['es', 'en'])) {
                Session::put('locale', $lang);
                App::setLocale($lang);
            }
        } else {
            // Usar el idioma guardado en sesión o el por defecto
            $locale = Session::get('locale', config('app.locale'));
            if (in_array($locale, ['es', 'en'])) {
                App::setLocale($locale);
            }
        }

        return $next($request);
    }
}
