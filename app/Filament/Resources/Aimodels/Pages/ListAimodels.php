<?php

namespace App\Filament\Resources\Aimodels\Pages;

use App\Filament\Resources\Aimodels\AimodelResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAimodels extends ListRecords
{
    protected static string $resource = AimodelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
