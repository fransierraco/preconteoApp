<?php

namespace App\Filament\Resources\Municipios;

use App\Filament\Resources\Municipios\Pages\CreateMunicipio;
use App\Filament\Resources\Municipios\Pages\EditMunicipio;
use App\Filament\Resources\Municipios\Pages\ListMunicipios;
use App\Filament\Resources\Municipios\Pages\ViewMunicipio;
use App\Filament\Resources\Municipios\Schemas\MunicipioForm;
use App\Filament\Resources\Municipios\Schemas\MunicipioInfolist;
use App\Filament\Resources\Municipios\Tables\MunicipiosTable;
use App\Models\Municipio;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MunicipioResource extends Resource
{
    protected static ?string $model = Municipio::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Municipio';

    public static function form(Schema $schema): Schema
    {
        return MunicipioForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return MunicipioInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MunicipiosTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListMunicipios::route('/'),
            'create' => CreateMunicipio::route('/create'),
            'view' => ViewMunicipio::route('/{record}'),
            'edit' => EditMunicipio::route('/{record}/edit'),
        ];
    }
}
