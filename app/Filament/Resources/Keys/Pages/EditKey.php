<?php

namespace App\Filament\Resources\Keys\Pages;

use App\Filament\Resources\Keys\KeyResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditKey extends EditRecord
{
    protected static string $resource = KeyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
