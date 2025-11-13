<?php

namespace App\Models;
// /var/www/html/preconteoApp/app/Models/Departamento.php

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $table = 'departamentos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'idDepartamento',
        'nombreDepartamento',
    ];

    /**
     * Relación: un departamento tiene muchos municipios.
     */
    // public function municipios()
    // {
    //     return $this->hasMany(Municipio::class, 'idDepartamento', 'idDepartamento');
    // }
}
