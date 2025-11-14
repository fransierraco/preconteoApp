<?php
// /var/www/html/preconteoApp/app/Filament/Resources/Municipios/Schemas/MunicipioForm.php

namespace App\Filament\Resources\Municipios\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use App\Models\Departamento;

class MunicipioForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([
            TextInput::make('idMunicipio')
                ->label('Código  municipio')
                ->required()
                ->maxLength(5)                       // evita overflow en UI
                ->rule('size:5')                     // exactamente 6
                ->rule('regex:/^\d{5}$/')            // solo números
                ->unique(
                    table: 'municipios',
                    column: 'idMunicipio',
                    ignoreRecord: true,
                )
                ->placeholder('95001')
                ->helperText('5 dígitos. Solo números.')
                ->inputMode('numeric'),

            TextInput::make('nombreMunicipio')
                ->label('Nombre municipio')
                ->required()
                ->maxLength(100)
                ->placeholder('San José del Guaviare'),

            Select::make('idDepartamento')
                ->label('Departamento')
                ->required()
                ->searchable()
                ->preload()
                ->options(fn () => Departamento::query()
                    ->orderBy('nombreDepartamento')
                    ->get()
                    ->mapWithKeys(fn (Departamento $d) => [
                        $d->idDepartamento => "{$d->idDepartamento} - {$d->nombreDepartamento}",
                    ])
                    ->toArray()
                )
                // validaciones coherentes con tu esquema (char(2) solo números)
                // ->maxLength(2)
                ->rule('size:2')
                ->rule('regex:/^\d{2}$/')
                ->helperText('Selecciona el departamento (guarda el código DANE).'),


        ]);
    }
}
