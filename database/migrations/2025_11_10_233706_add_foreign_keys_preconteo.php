<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        /**
         * MUNICIPIOS → DEPARTAMENTOS
         */
        if (Schema::hasTable('municipios') && Schema::hasTable('departamentos')) {
            Schema::table('municipios', function (Blueprint $table) {
                if (Schema::hasColumn('municipios', 'idDepartamento')) {
                    $table->foreign('idDepartamento', 'municipios_iddepartamento_foreign')
                        ->references('idDepartamento')
                        ->on('departamentos')
                        ->cascadeOnUpdate()
                        ->restrictOnDelete();
                }
            });
        }

        /**
         * ZONAS → MUNICIPIOS
         */
        if (Schema::hasTable('zonas') && Schema::hasTable('municipios')) {
            Schema::table('zonas', function (Blueprint $table) {
                if (Schema::hasColumn('zonas', 'idMunicipio')) {
                    $table->foreign('idMunicipio', 'zonas_idmunicipio_foreign')
                        ->references('idMunicipio')
                        ->on('municipios')
                        ->cascadeOnUpdate()
                        ->restrictOnDelete();
                }
            });
        }

        /**
         * PUESTOS → ZONAS
         */
        if (Schema::hasTable('puestos') && Schema::hasTable('zonas')) {
            Schema::table('puestos', function (Blueprint $table) {
                if (Schema::hasColumn('puestos', 'idZona')) {
                    $table->foreign('idZona', 'puestos_idzona_foreign')
                        ->references('idZona')
                        ->on('zonas')
                        ->cascadeOnUpdate()
                        ->restrictOnDelete();
                }
            });
        }

        /**
         * MESAS → PUESTOS
         */
        if (Schema::hasTable('mesas') && Schema::hasTable('puestos')) {
            Schema::table('mesas', function (Blueprint $table) {
                if (Schema::hasColumn('mesas', 'idPuesto')) {
                    $table->foreign('idPuesto', 'mesas_idpuesto_foreign')
                        ->references('idPuesto')
                        ->on('puestos')
                        ->cascadeOnUpdate()
                        ->restrictOnDelete();
                }
            });
        }

        /**
         * CANDIDATOS → CORPORACIONES
         */
        if (Schema::hasTable('candidatos') && Schema::hasTable('corporaciones')) {
            Schema::table('candidatos', function (Blueprint $table) {
                if (Schema::hasColumn('candidatos', 'idCorporacion')) {
                    $table->foreign('idCorporacion', 'candidatos_idcorporacion_foreign')
                        ->references('idCorporacion')
                        ->on('corporaciones')
                        ->cascadeOnUpdate()
                        ->nullOnDelete();
                }
            });
        }

        /**
         * E14S → MESAS, CANDIDATOS
         * (asegúrate de que en create_e14s_table:
         *  - idMesa sea char(3)
         *  - idCandidato sea char(10)
         */
        if (Schema::hasTable('e14s')) {
            Schema::table('e14s', function (Blueprint $table) {
                if (Schema::hasColumn('e14s', 'idMesa') && Schema::hasTable('mesas')) {
                    $table->foreign('idMesa', 'e14s_idmesa_foreign')
                        ->references('idMesa')
                        ->on('mesas')
                        ->cascadeOnUpdate()
                        ->restrictOnDelete();
                }

                if (Schema::hasColumn('e14s', 'idCandidato') && Schema::hasTable('candidatos')) {
                    $table->foreign('idCandidato', 'e14s_idcandidato_foreign')
                        ->references('idCandidato')
                        ->on('candidatos')
                        ->cascadeOnUpdate()
                        ->restrictOnDelete();
                }
            });
        }

        /**
         * TESTIGO_E14S → TESTIGOS, E14S
         * Pivot con IDs numéricos:
         *  - testigo_id -> testigos.id
         *  - e14_id -> e14s.id
         */
        if (Schema::hasTable('testigo_e14s')) {
            Schema::table('testigo_e14s', function (Blueprint $table) {
                if (Schema::hasColumn('testigo_e14s', 'testigo_id') && Schema::hasTable('testigos')) {
                    $table->foreign('testigo_id', 'testigo_e14s_testigo_id_foreign')
                        ->references('id')
                        ->on('testigos')
                        ->cascadeOnUpdate()
                        ->cascadeOnDelete();
                }

                if (Schema::hasColumn('testigo_e14s', 'e14_id') && Schema::hasTable('e14s')) {
                    $table->foreign('e14_id', 'testigo_e14s_e14_id_foreign')
                        ->references('id')
                        ->on('e14s')
                        ->cascadeOnUpdate()
                        ->cascadeOnDelete();
                }
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('municipios')) {
            Schema::table('municipios', function (Blueprint $table) {
                $table->dropForeign('municipios_iddepartamento_foreign');
            });
        }

        if (Schema::hasTable('zonas')) {
            Schema::table('zonas', function (Blueprint $table) {
                $table->dropForeign('zonas_idmunicipio_foreign');
            });
        }

        if (Schema::hasTable('puestos')) {
            Schema::table('puestos', function (Blueprint $table) {
                $table->dropForeign('puestos_idzona_foreign');
            });
        }

        if (Schema::hasTable('mesas')) {
            Schema::table('mesas', function (Blueprint $table) {
                $table->dropForeign('mesas_idpuesto_foreign');
            });
        }

        if (Schema::hasTable('candidatos')) {
            Schema::table('candidatos', function (Blueprint $table) {
                $table->dropForeign('candidatos_idcorporacion_foreign');
            });
        }

        if (Schema::hasTable('e14s')) {
            Schema::table('e14s', function (Blueprint $table) {
                $table->dropForeign('e14s_idmesa_foreign');
                $table->dropForeign('e14s_idcandidato_foreign');
            });
        }

        if (Schema::hasTable('testigo_e14s')) {
            Schema::table('testigo_e14s', function (Blueprint $table) {
                // Los nombres deben coincidir con los definidos arriba
                $table->dropForeign('testigo_e14s_testigo_id_foreign');
                $table->dropForeign('testigo_e14s_e14_id_foreign');
            });
        }
    }
};
