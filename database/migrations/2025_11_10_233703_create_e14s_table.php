<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('e14s', function (Blueprint $table) {
            $table->id(); // PK autoincremental

            $table->char('idE14', 3)
                ->nullable()
                ->unique()
                ->comment('Código interno del formulario E14 (opcional)');

            // Debe coincidir con mesas.idMesa (char(3))
            $table->char('idMesa', 3)
                ->comment('Código de mesa asociado');

            // Debe coincidir con candidatos.idCandidato (char(10))
            $table->char('idCandidato', 10)
                ->comment('Código de candidato asociado');

            $table->enum('reconteo', ['N', 'S'])
                ->default('N')
                ->comment('N = original, S = reconteo');

            $table->unsignedInteger('votos');

            $table->timestamps();

            $table->index('idMesa');
            $table->index('idCandidato');

            $table->unique(
                ['idMesa', 'idCandidato', 'reconteo'],
                'e14s_mesa_candidato_reconteo_unique'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('e14s');
    }
};
