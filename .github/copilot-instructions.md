## Instrucciones rápidas para agentes de código (Copilot / AI)

Formato: instrucciones concisas y accionables. Escribe PRs pequeños y explícitos.

Modelo: Enable Claude Haiku 4.5 for all clients

Contexto del proyecto

-   Tipo: aplicación Laravel (PHP ^8.2, Laravel ^11). Estructura estándar con algunas migraciones y seeders en `database/`.
-   Entradas clave:
    -   Rutas web: `routes/web.php`
    -   Controladores: `app/Http/Controllers/`
    -   Modelos Eloquent: `app/Models/` (y algunos modelos en `app/` como `Estacionamiento.php`, `Puesto.php`, `Reserva.php`, `Vehiculo.php`, `User.php`)
    -   Migrations: `database/migrations/` (timestamps obligatorios)
    -   Seeders: `database/seeders/` (ej.: `EstacionamientoSeeder.php`, `PuestoSeeder.php`)
    -   Vistas: `resources/views/`
    -   Assets: `vite.config.js`, `package.json` (scripts `dev` y `build`), `tailwind.config.js`, `public/estilos/`

Comandos y flujos de trabajo (verificados en repo)

-   Instalar dependencias PHP/JS:
    -   `composer install`
    -   `npm install`
-   Desarrollo local (script principal):
    -   `composer run dev` — arranca simultáneamente `php artisan serve`, listeners de queue, pail y `npm run dev` (usa `concurrently`).
    -   Alternativa manual: `php artisan serve` + `php artisan queue:listen` + `npm run dev`.
-   Build de assets: `npm run build` (usa Vite).
-   Migraciones/BD/seeders:
    -   `php artisan migrate`
    -   `php artisan db:seed --class=EstacionamientoSeeder`
    -   Nota: el post-create-project-cmd crea `database/database.sqlite` si no existe — revisa `.env`.
-   Tests: `php artisan test` o `./vendor/bin/phpunit` (phpunit ^11 está presente en dev deps).

Convenciones específicas del proyecto

-   Cuando añades una ruta web -> crea/actualiza: `routes/web.php`, controlador en `app/Http/Controllers/`, vista en `resources/views/` y (si persiste datos) migration + model + seeder.
-   Nombres de migraciones usan prefijo timestamp y las tablas reflejan el plural del modelo (ej.: `create_puestos_table.php`).
-   Los seeders existentes (`EstacionamientoSeeder`, `PuestoSeeder`) se usan para poblar datos de ejemplo; revisa `database/factories` para generación de usuarios/vehículos.
-   El proyecto usa `simplesoftwareio/simple-qrcode` (revisar usos para cambios de dependencias).

Patrones observables y ejemplos concretos

-   Modelos: `app/Estacionamiento.php` y `app/Puesto.php` (mira atributos rellenables / relaciones). Evita modificar relaciones sin actualizar controladores y vistas dependientes.
-   Coloca la lógica de negocio de reservas en `app/Models/Reserva.php` o en servicios si la operación involucra varios modelos.
-   Para cambios UI/JS: edita `resources/js` y recompila con `npm run dev` o `npm run build`.

Integración y procesos en segundo plano

-   `composer run dev` lanza `php artisan queue:listen` y `php artisan pail` — si añades jobs, asegúrate de que la serialización y las colas estén configuradas en `config/queue.php` y que el worker maneje los tries/timeout esperados.

Qué evitar / notas importantes

-   No asumas que hay scripts composer personalizados para test; usa `php artisan test` o `./vendor/bin/phpunit`.
-   No cambies `database/migrations` existentes sin crear una nueva migration; mantener el historial de migraciones es crítico.

Cambios de PR recomendados

-   Haz PRs pequeños y descriptivos. Incluir:
    -   Qué archivo(s) cambias y por qué
    -   Comandos de verificación (ej.: `php artisan migrate --seed`, `php artisan test`, `npm run build`)
    -   Si añades migración, incluye seeder o instrucciones de rollback

Dónde mirar primero (anchoring files)

-   `routes/web.php` — punto de entrada para funcionalidades web
-   `app/Http/Controllers/` — controladores responsables de la mayoría de las rutas
-   `app/Models/` y `database/migrations/` — cambios de esquema y modelos
-   `package.json`, `vite.config.js`, `tailwind.config.js` — assets / build
-   `phpunit.xml` — configuración de tests

Si algo no está claro

-   Pide contexto: ruta afectada, modelo/tables involucradas, y pasos exactos para reproducir el estado esperado.

Fin.
