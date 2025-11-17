/**
 * Controlador de traducción simplificado
 * Usa sesión de Laravel y cambio de locale en el servidor
 * (Sin dependencia de Google Translate API cliente)
 */

document.addEventListener('DOMContentLoaded', function () {
    console.log('✓ DOM Cargado - inicializando selector de idioma');

    const languageSelector = document.getElementById('language-selector');

    if (!languageSelector) {
        console.warn('⚠ Selector de idioma no encontrado');
        return;
    }

    // Establecer idioma actual
    const currentLang = document.documentElement.lang || 'es';
    languageSelector.value = currentLang;
    console.log('✓ Idioma actual:', currentLang);

    // Evento change del selector
    languageSelector.addEventListener('change', function (e) {
        const selectedLanguage = e.target.value;
        console.log('► Cambiando a idioma:', selectedLanguage);

        // Traducir el contenido de forma local primero
        if (typeof translatePageContent === 'function') {
            console.log('► Aplicando traducciones locales...');
            translatePageContent(selectedLanguage);
        }

        // Llamar a la ruta para cambiar el idioma en sesión
        const url = `/set-language/${selectedLanguage}`;

        fetch(url, {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
            .then(response => response.json())
            .then(data => {
                console.log('✓ Respuesta del servidor:', data);
                if (data.success) {
                    console.log('✓ Idioma cambiado exitosamente a:', data.language);
                    console.log('► Las próximas páginas se cargarán en', data.language);
                } else {
                    console.error('✗ Error al cambiar idioma:', data);
                }
            })
            .catch(error => {
                console.error('✗ Error en fetch:', error);
            });
    });
});


