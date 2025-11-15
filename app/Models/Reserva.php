<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model {
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'puesto_id',
        'estado',
        'codigo_qr',
        'hora_aprobacion'
    ];

    public function usuario() {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function puesto() {
        return $this->belongsTo(Puesto::class, 'puesto_id');
    }
}
