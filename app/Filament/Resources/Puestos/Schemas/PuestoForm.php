<?php

namespace App\Filament\Resources\Puestos\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use App\Models\Zona;

class PuestoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('idPuesto')
                    ->label('Código de puesto')
                    ->required(),
                TextInput::make('nombrePuesto')
                    ->label('Nombre del puesto')
                    ->required(),

                Select::make('idZona')
                    ->label('Zona')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->options(fn () => Zona::query()
                        ->orderBy('nombreZona')
                        ->get()
                        ->mapWithKeys(fn (Zona $d) => [
                            $d->idZona => "{$d->idZona} - {$d->nombreZona}",
                        ])
                        ->toArray()),

                // TextInput::make('idZona')
                //     ->label('Zona')
                //     ->required(),
            ]);
    }
}
