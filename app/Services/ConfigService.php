<?php

namespace App\Services;

use App\Models\Setting;

/**
 * Servicio para gestionar las configuraciones de la aplicación.
 */
class ConfigService
{
    // Array para almacenar las configuraciones cargadas desde la base de datos
    protected $settings = [];

    /**
     * Constructor que carga las configuraciones al inicializar el servicio.
     */
    public function __construct()
    {
        $this->loadSettings();
    }

    /**
     * Carga todas las configuraciones desde la base de datos y las almacena en un array.
     */
    protected function loadSettings()
    {
        // Obtiene todas las configuraciones desde la tabla 'settings'
        $settings = Setting::all();

        // Almacena cada configuración en el array asociativo '$settings' usando la clave como índice
        foreach ($settings as $setting) {
            $this->settings[$setting->key] = $setting->value;
        }
    }

    /**
     * Obtiene el valor de una configuración específica.
     *
     * @param string $key La clave de la configuración que se desea obtener.
     * @param mixed $default Valor por defecto que se devolverá si la clave no existe.
     * @return mixed El valor de la configuración o el valor por defecto si la clave no existe.
     */
    public function get($key, $default = null)
    {
        // Devuelve el valor de la configuración si existe, de lo contrario devuelve el valor por defecto
        return $this->settings[$key] ?? $default;
    }
}
