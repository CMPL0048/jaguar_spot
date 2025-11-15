<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
    use HasFactory, Notifiable;

    protected $fillable = [
        'nombre_completo',
        'usuario',
        'tipo_usuario',
        'identificador',
        'tipo_discapacitado_extra',
        'email',
        'password',
    ];

    protected $hidden = ['password', 'remember_token'];

    public function vehiculos() {
        return $this->hasMany(Vehiculo::class);
    }

        // Relación: Un usuario puede tener muchas reservas
    public function reservas() {
        return $this->hasMany(Reserva::class, 'usuario_id');
    }
    
}
