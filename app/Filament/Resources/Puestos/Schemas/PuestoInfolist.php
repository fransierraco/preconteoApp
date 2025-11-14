<?php

namespace App\Filament\Resources\Puestos\Schemas;

use App\Models\Zona;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PuestoInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('idPuesto')
                    ->label('Código de puesto'),
                TextEntry::make('nombrePuesto')
                    ->label('Nombre del puesto'),


                TextEntry::make('zona.nombreZona')
                    ->label('Zona'),


                TextEntry::make('created_at')
                    ->label('Creado')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->label('Actualizado')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
