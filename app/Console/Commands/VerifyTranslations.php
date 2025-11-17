<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class VerifyTranslations extends Command
{
    /**
     * El nombre y la firma del comando.
     *
     * @var string
     */
    protected $signature = 'translations:verify';

    /**
     * La descripción del comando.
     *
     * @var string
     */
    protected $description = 'Verifica que todas las traducciones estén sincronizadas entre idiomas';

    /**
     * Ejecutar el comando.
     */
    public function handle()
    {
        $this->info('🔍 Verificando traducciones...\n');

        // Cargar archivos de traducción
        $esMessages = include resource_path('lang/es/messages.php');
        $enMessages = include resource_path('lang/en/messages.php');

        $esKeys = array_keys($esMessages);
        $enKeys = array_keys($enMessages);

        $allKeys = array_unique(array_merge($esKeys, $enKeys));

        $missing = [];

        foreach ($allKeys as $key) {
            if (!isset($esMessages[$key])) {
                $missing[] = "❌ Falta en ESPAÑOL: $key";
            }
            if (!isset($enMessages[$key])) {
                $missing[] = "❌ Falta en INGLÉS: $key";
            }
        }

        if (empty($missing)) {
            $this->info('✅ TODAS LAS TRADUCCIONES ESTÁN SINCRONIZADAS');
            $this->line("\n📊 Estadísticas:");
            $this->line("   Total de claves: " . count($allKeys));
            $this->line("   Español: " . count($esKeys) . " claves");
            $this->line("   Inglés: " . count($enKeys) . " claves");
        } else {
            $this->error('⚠️  SE ENCONTRARON PROBLEMAS:\n');
            foreach ($missing as $error) {
                $this->line($error);
            }
        }

        return 0;
    }
}
