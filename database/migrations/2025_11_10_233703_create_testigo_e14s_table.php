<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('testigo_e14s', function (Blueprint $table) {
            $table->id(); // PK autoincremental (útil para trazabilidad y Filament)

            // Relaciones numéricas (FKs se agregan en add_foreign_keys_preconteo.php)
            $table->unsignedBigInteger('testigo_id')
                ->comment('Referencia al testigo asociado');

            $table->unsignedBigInteger('e14_id')
                ->comment('Referencia al formulario E14 asociado');

            $table->timestamps();

            // Evitar duplicados: un testigo no puede registrar el mismo E14 dos veces
            $table->unique(['testigo_id', 'e14_id'], 'testigo_e14s_testigo_e14_unique');

            // Índices de apoyo
            $table->index('testigo_id', 'testigo_e14s_testigo_id_index');
            $table->index('e14_id', 'testigo_e14s_e14_id_index');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('testigo_e14s');
    }
};
