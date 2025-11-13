<?php

namespace App\Filament\Resources\Zonas\Schemas;

use App\Models\Municipio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ZonaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('idZona')
                    ->label('Código de Zona')
                    ->required(),
                TextInput::make('nombreZona')
                    ->label('Nombre de Zona')
                    ->required(),

                Select::make('idMunicipio')
                    ->label('Municipio')
                    ->preload()
                    ->options(fn () => Municipio::query()
                    ->orderBy('nombreMunicipio')
                    ->get()
                    ->mapWithKeys(fn (Municipio $d) => [
                        $d->idMunicipio => "{$d->idMunicipio} - {$d->nombreMunicipio}",
                    ])
                    ->toArray()
                    )
                    ->searchable(),

                // TextInput::make('municipio.nombreMunicipio')
                //     ->label('Municipio')
                //     ->required(),
            ]);
    }
}
