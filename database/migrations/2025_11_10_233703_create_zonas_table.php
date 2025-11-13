<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('zonas', function (Blueprint $table) {
            $table->id(); // PK autoincremental

            $table->char('idZona', 2)
                ->unique()
                ->comment('Código interno de zona');

            $table->string('nombreZona', 100);

            $table->char('idMunicipio', 5)
                ->comment('Código DANE municipio');

            $table->timestamps();

            $table->index('nombreZona');
            $table->index('idMunicipio', 'zonas_idmunicipio_index'); // <- distinto de _foreign
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('zonas');
    }
};
