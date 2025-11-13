<?php

namespace App\Filament\Resources\Municipios\Pages;

use App\Filament\Resources\Municipios\MunicipioResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewMunicipio extends ViewRecord
{
    protected static string $resource = MunicipioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
