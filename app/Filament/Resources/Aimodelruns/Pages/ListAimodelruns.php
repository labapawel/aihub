<?php

namespace App\Filament\Resources\Aimodelruns\Pages;

use App\Filament\Resources\Aimodelruns\AimodelrunResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAimodelruns extends ListRecords
{
    protected static string $resource = AimodelrunResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
