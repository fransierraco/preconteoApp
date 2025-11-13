<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('departamentos', function (Blueprint $table) {
            $table->id(); // PK autoincremental estándar para Eloquent

            $table->char('idDepartamento', 2)
                ->unique()
                ->comment('Código DANE departamento');

            $table->string('nombreDepartamento', 60);

            $table->timestamps();

            $table->index('nombreDepartamento');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('departamentos');
    }
};
