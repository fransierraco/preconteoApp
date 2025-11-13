<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('puestos', function (Blueprint $table) {
            $table->id(); // PK autoincremental para compatibilidad con Eloquent / Filament

            $table->char('idPuesto', 2)
                ->unique()
                ->comment('Código interno o DANE del puesto');

            $table->string('nombrePuesto', 100)
                ->comment('Nombre del puesto de votación');

            $table->char('idZona', 2)
                ->comment('Código de zona asociada');

            $table->timestamps();

            // Índices para consultas rápidas
            $table->index('nombrePuesto');
            $table->index('idZona', 'puestos_idzona_index');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('puestos');
    }
};
