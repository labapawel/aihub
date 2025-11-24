<?php

namespace App\Filament\Resources\Aimodelruns\Pages;

use App\Filament\Resources\Aimodelruns\AimodelrunResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAimodelrun extends EditRecord
{
    protected static string $resource = AimodelrunResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
