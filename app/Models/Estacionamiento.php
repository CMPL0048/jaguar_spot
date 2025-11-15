<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estacionamiento extends Model {
    use HasFactory;

    protected $fillable = [
        'nombre', 
        'capacidad'
    ];

    public function puestos() {
        return $this->hasMany(Puesto::class);
    }
}

