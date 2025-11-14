<?php

namespace App\Filament\Resources\Municipios\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Grid;
use Filament\Support\Icons\Heroicon;

class MunicipioInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextEntry::make('idMunicipio')
                    ->label('Código Municipio')
                    ->color('success')
                    ->icon(Heroicon::ArrowDownRight)
                    ->money('COP', decimalPlaces: 2, locale: 'es_CO'),


                TextEntry::make('nombreMunicipio')
                    ->label('Municipio'),

                TextEntry::make('departamento.nombreDepartamento')
                    ->label('Departamento'),

                Grid::make(2) // 2 columnas
                        ->schema([
                    TextEntry::make('created_at')
                        ->label('Creado')
                        ->dateTime()
                        ->placeholder('-'),

                    TextEntry::make('updated_at')
                        ->label('Actualizado')
                        ->dateTime()
                        ->placeholder('-'),
                    ]),

            ]);
    }
}
