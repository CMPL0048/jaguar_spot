<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Cambiar el idioma de la aplicación
     * Guarda la preferencia en la sesión
     */
    public function setLanguage(Request $request, $language)
    {
        // Validar que el idioma sea uno de los permitidos
        $allowed = ['es', 'en'];

        if (!in_array($language, $allowed)) {
            $language = 'es'; // Default
        }

        // Guardar en sesión
        session(['app_language' => $language]);

        // Guardar en cookie también (persiste más tiempo)
        cookie()->queue(cookie('app_language', $language, 60 * 24 * 365)); // 1 año

        // Si es una llamada AJAX, retornar JSON
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'language' => $language,
                'message' => 'Idioma cambiado correctamente'
            ]);
        }

        // Si no, redirigir a la referencia o página anterior
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
