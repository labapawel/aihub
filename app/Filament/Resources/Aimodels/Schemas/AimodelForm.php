<?php

namespace App\Filament\Resources\Aimodels\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use LaraZeus\TorchFilament\Infolists\TorchEntry;
use Filament\Forms\Components\Select;
// use WeStacks\FilamentMonacoEditor\MonacoEditor;
use Filament\Forms\Components\Checkbox;


class AimodelForm
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
                    TextInput::make('version')
                    ->label(__('admin.title.version'))
                    ->required()
                    ->columnSpanFull()
                    ->maxLength(50),
                Textarea::make('description')
                    ->label(__('admin.title.description'))
                    ->columnSpanFull(),
                Textarea::make('script')
                    ->label(__('admin.title.script'))
                    // ->language('php') // Jeśli dodano metodę language()
                    // ->language('vs|vs-dark')
                 //   ->required()
                    ->columnSpanFull(),    
               
                TextInput::make('limitperday')
                    ->label(__('admin.title.limitperday'))
                    ->required()
                    ->numeric()
                    ->columnSpanFull()
                    ->minValue(1)
                    ->step(1),
                TextInput::make('limitperminute')
                    ->label(__('admin.title.limitperminute'))
                    ->required()
                    ->numeric()
                    ->columnSpanFull()
                    ->minValue(1)
                    ->step(1),
                Select::make('group_id')
                    ->label(__('admin.title.group'))
                    ->relationship('group', 'name')
                    ->required()
                    ->columnSpanFull(),
                Select::make('scheduler_id')
                    ->label(__('admin.title.schedule'))
                    ->relationship('schedule', 'name')
                    ->required()
                    ->columnSpanFull(),
                    Checkbox::make('active')
                    ->label(__('admin.title.active'))
                    ->default(true)
                    ->columnSpanFull(),
            ]);
    }
}
