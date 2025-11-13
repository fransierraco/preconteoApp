<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('candidatos', function (Blueprint $table) {
            $table->id(); // PK autoincremental

            $table->char('idCandidato', 10)
                ->unique()
                ->comment('Código interno o identificación del candidato');

            $table->string('nombreCandidato', 150);

            $table->char('idCorporacion', 2)
                ->nullable()
                ->comment('Código de corporación o tipo de elección');

            $table->timestamps();

            $table->index('nombreCandidato');
            $table->index('idCorporacion'); // <-- SIN nombre manual, Laravel le pone uno propio
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('candidatos');
    }
};
