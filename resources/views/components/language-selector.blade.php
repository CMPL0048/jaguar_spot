<div class="language-selector">
    <select id="language-select" onchange="changeLanguage(this.value)">
        <option value="es" {{ app()->getLocale() == 'es' ? 'selected' : '' }}>Español</option>
        <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
    </select>
</div>

<style>
    .language-selector {
        display: inline-block;
    }

    .language-selector select {
        padding: 8px 12px;
        border: 1px solid #ddd;
        border-radius: 4px;
        background-color: white;
        cursor: pointer;
        font-size: 14px;
    }

    .language-selector select:hover {
        border-color: #999;
    }
</style>

<script>
    function changeLanguage(lang) {
        // Redirigir a la página actual con el parámetro de idioma
        const url = new URL(window.location);
        url.searchParams.set('lang', lang);
        window.location.href = url.toString();
    }
</script>
