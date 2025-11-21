<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Cambiar el idioma de la aplicación
     * Guarda en: sesión, cookie (para persistencia entre navegadores/tabs)
     */
    public function setLanguage(Request $request, $language)
    {
        // Validar que el idioma sea uno de los permitidos
        $allowed = ['es', 'en'];

        if (!in_array($language, $allowed)) {
            $language = 'es'; // Default
        }

        // Guardar en sesión para la solicitud actual
        session(['app_language' => $language]);

        // Guardar en cookie para persistencia de larga duración (1 año)
        // Esto sincroniza con localStorage del navegador
        cookie()->queue(cookie('app_language', $language, 60 * 24 * 365));

        // Si es una llamada AJAX, retornar JSON
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'language' => $language,
                'message' => 'Idioma guardado correctamente en sesión y localStorage'
            ]);
        }

        // Si no es AJAX, redirigir manteniendo el idioma
        return redirect()->back();
    }

    /**
     * Obtener el idioma actual
     */
    public function getCurrentLanguage()
    {
        return session('app_language', config('app.locale', 'es'));
    }
}
