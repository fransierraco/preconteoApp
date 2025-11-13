<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mesas', function (Blueprint $table) {
            $table->id(); // PK autoincremental

            $table->char('idMesa', 3)
                ->unique()
                ->comment('Código interno o oficial de la mesa');

            $table->char('idPuesto', 2)
                ->comment('Código de puesto asociado');

            $table->timestamps();

            $table->index('idPuesto', 'mesas_idpuesto_index');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mesas');
    }
};
