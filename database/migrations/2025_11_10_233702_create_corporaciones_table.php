<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('corporaciones', function (Blueprint $table) {
            $table->id(); // PK autoincremental

            $table->char('idCorporacion', 2)
                ->unique()
                ->comment('Código interno o DANE de la corporación');

            $table->string('nombreCorporacion', 120)
                ->comment('Nombre completo de la corporación electoral');

            $table->timestamps();

            $table->index('nombreCorporacion');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('corporaciones');
    }
};
