<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    protected $table = 'zonas';

    protected $primaryKey = 'id';

    protected $fillable = [
        'idZona',
        'nombreZona',
        'idMunicipio',
    ];

    protected $casts = [
        'idZona' => 'string',
        'idMunicipio' => 'string',
    ];

    // Ejemplo de relación si más adelante agregas municipios
    public function municipio()
    {
        return $this->belongsTo(Municipio::class, 'idMunicipio', 'idMunicipio');
    }
}
