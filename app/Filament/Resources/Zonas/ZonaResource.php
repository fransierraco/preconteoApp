<?php

namespace App\Filament\Resources\Zonas;

use App\Filament\Resources\Zonas\Pages\CreateZona;
use App\Filament\Resources\Zonas\Pages\EditZona;
use App\Filament\Resources\Zonas\Pages\ListZonas;
use App\Filament\Resources\Zonas\Pages\ViewZona;
use App\Filament\Resources\Zonas\Schemas\ZonaForm;
use App\Filament\Resources\Zonas\Schemas\ZonaInfolist;
use App\Filament\Resources\Zonas\Tables\ZonasTable;
use App\Models\Zona;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ZonaResource extends Resource
{
    protected static ?string $model = Zona::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedMapPin;

    protected static UnitEnum|string|null $navigationGroup = 'Divipol';

    protected static ?int $navigationSort = 30;

    protected static ?string $recordTitleAttribute = 'Zona';

    public static function form(Schema $schema): Schema
    {
        return ZonaForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ZonaInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ZonasTable::configure($table);
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
            'index' => ListZonas::route('/'),
            'create' => CreateZona::route('/create'),
            'view' => ViewZona::route('/{record}'),
            'edit' => EditZona::route('/{record}/edit'),
        ];
    }
}
