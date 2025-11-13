<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('testigos', function (Blueprint $table) {
            $table->id(); // PK autoincremental estándar

            $table->char('idTestigo', 10)
                ->unique()
                ->comment('Código interno / identificación del testigo');

            $table->string('nombreTestigo', 150);

            $table->timestamps();

            $table->index('nombreTestigo');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('testigos');
    }
};
