<?php

namespace App\Filament\Resources\Aimodels\Pages;

use App\Filament\Resources\Aimodels\AimodelResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAimodel extends EditRecord
{
    protected static string $resource = AimodelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
