<?php

namespace App\Filament\Resources\Keys\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Checkbox;


class KeyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('key')
                    ->label(__('admin.title.key'))
                    ->required()
                    ->columnSpanFull()
                    ->maxLength(255),
                TextInput::make('requests_used')
                    ->label(__('admin.title.requests_used'))
                    ->readonly()
                    ->default(0)
                    ->numeric()
                    ->columnSpanFull(),
                Select::make('groups')
                    ->label(__('admin.title.groups'))
                    ->multiple()
                    ->relationship('groups', 'name')
                    ->columnSpanFull(),
                Checkbox::make('active')
                    ->label(__('admin.title.active'))
                    ->columnSpanFull(),
            ]);
    }
}
