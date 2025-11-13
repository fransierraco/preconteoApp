<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('municipios', function (Blueprint $table) {
            $table->id(); // PK autoincremental

            $table->char('idMunicipio', 5)
                ->unique()
                ->comment('Código DANE municipio');

            $table->string('nombreMunicipio', 100);

            $table->char('idDepartamento', 2)
                ->comment('Código DANE departamento');

            $table->timestamps();

            $table->index('nombreMunicipio');
            $table->index('idDepartamento', 'municipios_iddepartamento_index'); // <- ojo: _index, no _foreign
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('municipios');
    }
};
