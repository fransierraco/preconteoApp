<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    protected $table = 'puestos';

    protected $fillable = [
        'idPuesto',
        'nombrePuesto',
        'idZona',
    ];

    /**
     * Relación: Un puesto pertenece a una zona
     */
    public function zona()
    {
        return $this->belongsTo(Zona::class, 'idZona', 'idZona');
    }
}
