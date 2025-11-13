<?php

namespace App\Filament\Resources\Zonas\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ZonaInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('idZona')
                    ->label('Código de Zona'),
                TextEntry::make('nombreZona')
                    ->label('Nombre de Zona'),
                TextEntry::make('municipio.nombreMunicipio')
                    ->label('Municipio'),
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
