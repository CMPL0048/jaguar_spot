/**
 * Controlador de traducción con persistencia en localStorage
 * - Guarda idioma en localStorage para persistencia entre páginas
 * - Sincroniza con el servidor para mantener sesión
 * - Aplica traducciones instantáneamente sin recarga
 */

document.addEventListener('DOMContentLoaded', function () {
    console.log('✓ DOM Cargado - inicializando sistema de traducción');

    const languageSelector = document.getElementById('language-selector');

    if (!languageSelector) {
        console.warn('⚠ Selector de idioma no encontrado');
        return;
    }

    // 1. OBTENER IDIOMA GUARDADO O POR DEFECTO
    let currentLang = localStorage.getItem('app_language') || document.documentElement.lang || 'es';

    // Validar idioma
    if (!['es', 'en'].includes(currentLang)) {
        currentLang = 'es';
    }

    // 2. APLICAR IDIOMA GUARDADO AL CARGAR LA PÁGINA
    console.log('✓ Idioma guardado en localStorage:', currentLang);
    languageSelector.value = currentLang;

    // Aplicar traducciones inmediatamente si no está en español
    if (currentLang !== 'es' && typeof translatePageContent === 'function') {
        console.log('► Aplicando traducciones del localStorage al cargar...');
        translatePageContent(currentLang);
    }

    // Actualizar HTML lang attribute
    document.documentElement.lang = currentLang;

    // 3. EVENTO CHANGE DEL SELECTOR
    languageSelector.addEventListener('change', function (e) {
        const selectedLanguage = e.target.value;
        console.log('► Usuario seleccionó idioma:', selectedLanguage);

        // Guardar en localStorage PRIMERO
        localStorage.setItem('app_language', selectedLanguage);
        console.log('✓ Idioma guardado en localStorage:', selectedLanguage);

        // Actualizar HTML lang attribute
        document.documentElement.lang = selectedLanguage;

        // Traducir el contenido de forma local
        if (typeof translatePageContent === 'function') {
            console.log('► Aplicando traducciones locales...');
            translatePageContent(selectedLanguage);
        }

        // Emitir evento para que otros scripts sepan que cambió el idioma
        const languageEvent = new CustomEvent('languageChanged', {
            detail: { language: selectedLanguage }
        });
        document.dispatchEvent(languageEvent);
        console.log('✓ Evento languageChanged emitido');

        // Sincronizar con el servidor (para mantener sesión)
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
                    console.log('✓ Idioma sincronizado en sesión:', data.language);
                    console.log('✓ Idioma persistente entre páginas');
                } else {
                    console.error('✗ Error al sincronizar idioma:', data);
                }
            })
            .catch(error => {
                console.error('✗ Error en fetch:', error);
                console.warn('⚠ Pero el idioma está guardado localmente en:', selectedLanguage);
            });
    });

    console.log('✓ Sistema de traducción inicializado correctamente');
});

