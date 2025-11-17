# 🌍 Sistema de Traducción - Jaguar Spot

## 📋 Descripción General

Este proyecto implementa un sistema de traducción multiidioma manual (sin APIs externas) que permite cambiar entre **Español (es)** e **Inglés (en)**.

### Características:
- ✅ Traducción manual sin dependencias externas
- ✅ Selector de idioma integrado en la interfaz
- ✅ Persistencia de preferencia de idioma en sesión
- ✅ Cambio dinámico del idioma sin recargar la página
- ✅ Fácil mantenimiento y personalización

---

## 📁 Estructura de Archivos

```
resources/
├── lang/
│   ├── es/
│   │   └── messages.php          # Traducción al Español
│   └── en/
│       └── messages.php          # Traducción al Inglés
└── views/
    ├── components/
    │   └── language-selector.blade.php  # Selector de idioma
    ├── auth/
    │   ├── login.blade.php       # Login traducido
    │   └── signup.blade.php      # Registro traducido
    ├── estacionamientos/
    │   ├── index.blade.php       # Lista de estacionamientos
    │   └── show.blade.php        # Detalle de puesto
    ├── reservas/
    │   └── mis_reservas.blade.php # Mis reservas
    └── admin/
        ├── dashboard.blade.php   # Panel admin
        └── verificar.blade.php   # Verificación QR
```

---

## 🔧 Configuración

### 1. **Archivo de Configuración** (`config/app.php`)

El idioma por defecto está configurado como **Español (es)**:

```php
'locale' => env('APP_LOCALE', 'es'),
'fallback_locale' => env('APP_FALLBACK_LOCALE', 'es'),
```

Para cambiar el idioma por defecto, modifica el archivo `.env`:

```env
APP_LOCALE=es    # o 'en'
```

### 2. **Middleware de Localización** (`app/Http/Middleware/SetLocale.php`)

El middleware automáticamente:
- Detecta parámetro de idioma en la URL (`?lang=en`)
- Guarda la preferencia en sesión
- Establece el locale de la aplicación

Está registrado en `app/Http/Kernel.php` en el grupo web.

---

## 📝 Archivos de Traducción

### Estructura de `resources/lang/{locale}/messages.php`

```php
<?php

return [
    // Clave => Valor traducido
    'app_name' => 'Jaguar Spot',
    'home' => 'Inicio',
    'login_title' => 'Iniciar Sesión',
    // ... más claves
];
```

### Claves Disponibles:

**Generales:**
- `app_name` - Nombre de la aplicación
- `home` - Inicio
- `parking` - Estacionamientos
- `help` - Ayuda
- `login` - Iniciar Sesión
- `register` - Registrarse
- `logout` - Cerrar Sesión

**Formularios:**
- `username` - Nombre de Usuario
- `password` - Contraseña
- `email` - Correo Electrónico
- `full_name` - Nombre Completo

**Estados y Mensajes:**
- `pending` - Pendiente
- `accepted` - Aceptado
- `rejected` - Rechazado
- `success` - Éxito
- `error` - Error

---

## 💻 Uso en Vistas (Blade)

### Función `__()` o `trans()`

Para traducir un texto en una vista Blade, usa la función `__()`:

```blade
<!-- Traducción simple -->
<h1>{{ __('messages.home') }}</h1>

<!-- Con atributos HTML -->
<a href="{{ route('login') }}">{{ __('messages.login') }}</a>

<!-- En JavaScript dentro de Blade -->
<script>
    const title = "{{ __('messages.success') }}";
</script>
```

### Ejemplos Reales:

**Archivo:** `resources/views/index.blade.php`

```blade
<!-- Antes (sin traducción) -->
<h1>Bienvenido a Jaguar Spot</h1>
<p>Jaguar Spot te permitirá tener el control de tu estacionamiento...</p>

<!-- Después (traducido) -->
<h1>{{ __('messages.welcome') }}</h1>
<p>{{ __('messages.parking_description') }}</p>
```

---

## 🌐 Selector de Idioma

### Componente Blade

**Ubicación:** `resources/views/components/language-selector.blade.php`

```blade
@include('components.language-selector')
```

### Cómo Funciona:

1. El selector detecta el idioma actual: `app()->getLocale()`
2. Al cambiar el idioma, redirige a la página actual con `?lang=es` o `?lang=en`
3. El middleware captura el parámetro y guarda en sesión

### HTML Generado:

```html
<div class="language-selector">
    <select id="language-select" onchange="changeLanguage(this.value)">
        <option value="es" selected>Español</option>
        <option value="en">English</option>
    </select>
</div>
```

---

## 🔄 Flujo de Cambio de Idioma

```
Usuario selecciona idioma
        ↓
changeLanguage(lang) se ejecuta
        ↓
Redirige a: ?lang=es (o en)
        ↓
SetLocale Middleware intercepta
        ↓
Valida idioma soportado
        ↓
Guarda en Session::put('locale', lang)
        ↓
App::setLocale(lang)
        ↓
Página se recarga con nuevo idioma
```

---

## ✨ Agregar Nuevas Traducciones

### Paso 1: Agregar Clave a Ambos Archivos

**`resources/lang/es/messages.php`:**
```php
'new_feature' => 'Nueva Característica',
```

**`resources/lang/en/messages.php`:**
```php
'new_feature' => 'New Feature',
```

### Paso 2: Usar en la Vista

**`resources/views/ejemplo.blade.php`:**
```blade
<h1>{{ __('messages.new_feature') }}</h1>
```

---

## 🧪 Pruebas

### Cambiar Idioma en la URL

```
http://localhost/estacionamientos?lang=es  → Español
http://localhost/estacionamientos?lang=en  → English
```

### Verificar Idioma Actual en Blade

```blade
<!-- Idioma actual -->
<p>Idioma actual: {{ app()->getLocale() }}</p>

<!-- Condicionales por idioma -->
@if(app()->getLocale() == 'es')
    <p>Estás en Español</p>
@endif
```

### En JavaScript

```javascript
// Obtener idioma actual
const locale = '{{ app()->getLocale() }}';

// Usar traducciones
console.log('{{ __('messages.welcome') }}');
```

---

## 📱 Integración con Rutas

### Ruta con Parámetro de Idioma

```php
// routes/web.php
Route::get('/estacionamientos?lang=es', [EstacionamientoController::class, 'index']);
```

El middleware automáticamente captura `?lang=es` y aplica la traducción.

---

## 🎯 Mejores Prácticas

### ✅ Hacer:

1. **Usar claves descriptivas:**
   ```php
   'user_full_name' => 'Nombre Completo del Usuario'
   ```

2. **Mantener la estructura consistente:**
   ```php
   // Por sección
   'auth' => [
       'login' => 'Iniciar Sesión',
       'password' => 'Contraseña',
   ]
   ```

3. **Documentar nuevas claves** en este archivo

### ❌ No Hacer:

1. **Traduciones hardcodeadas en vistas:**
   ```blade
   <!-- ❌ MAL -->
   <h1>Hola Mundo</h1>
   
   <!-- ✅ BIEN -->
   <h1>{{ __('messages.hello_world') }}</h1>
   ```

2. **Números o textos mágicos sin traducción**

---

## 🚀 Próximas Mejoras Recomendadas

1. **Pluralización:** Soportar singular/plural
   ```blade
   {{ trans_choice('messages.cars', $count) }}
   ```

2. **Parámetros en traducciones:**
   ```php
   'welcome_user' => 'Bienvenido :name',
   ```
   ```blade
   {{ __('messages.welcome_user', ['name' => $user->name]) }}
   ```

3. **Exportar traducciones a JSON:**
   ```json
   {
       "messages": {
           "home": "Inicio",
           "login": "Iniciar Sesión"
       }
   }
   ```

4. **URL localizadas:**
   ```
   /es/estacionamientos
   /en/parking
   ```

---

## 📞 Soporte

Para agregar nuevas traducciones o idiomas:

1. Crear nuevo archivo en `resources/lang/{locale}/messages.php`
2. Copiar estructura de `messages.php` existente
3. Traducir todas las claves
4. Registrar el idioma en documentación
5. Actualizar selector si es necesario

---

**Última actualización:** 16 de noviembre de 2025
**Versión:** 1.0.0
**Idiomas soportados:** Español (es), English (en)
