<?php

namespace App\Filament\Resources\Groups\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;

class GroupForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label(__('admin.title.name'))
                    ->required()
                    ->columnSpanFull()
                    ->maxLength(255),
                Textarea::make('description')
                    ->label(__('admin.title.description'))
                    ->columnSpanFull(),
            ]);
    }
}
