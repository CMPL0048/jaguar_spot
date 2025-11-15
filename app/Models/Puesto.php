<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puesto extends Model {
    use HasFactory;

    protected $fillable = [
        'estacionamiento_id', 
        'numero_puesto', 
        'estado', 
        'tipo'
    ];

    public function estacionamiento() {
        return $this->belongsTo(Estacionamiento::class);
    }

    public function reserva() {
        return $this->hasOne(Reserva::class);
    }
}

