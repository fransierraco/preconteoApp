<?php
// /var/www/html/preconteoApp/app/Models/Municipio.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

    protected $table = 'municipios';

    protected $primaryKey = 'id';  // bigint(20) unsigned auto_increment
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'idMunicipio',      // Código DANE municipio (char(5))
        'nombreMunicipio',  // Nombre del municipio (varchar 100)
        'idDepartamento',   // Código DANE departamento (char(2))
    ];

    /**
     * Relación: Municipio pertenece a un Departamento.
     * Clave foránea: municipios.idDepartamento (char 2)
     * Clave primaria de referencia: departamentos.idDepartamento (char 2)
     */
    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'idDepartamento', 'idDepartamento');
    }
}
