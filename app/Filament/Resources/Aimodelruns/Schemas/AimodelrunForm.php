<?php

namespace App\Filament\Resources\Aimodelruns\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;

class AimodelrunForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('aimodel_id')
                    ->label(__('admin.title.aimodelid'))
                    ->readonly()
                    // ->required()
                    ->columnSpanFull(),
                Textarea::make('input_data')
                    ->label(__('admin.title.input_data'))
                    ->readonly()
                    ->columnSpanFull(),
                Textarea::make('output_data')
                    ->label(__('admin.title.output_data'))
                    ->readonly()
                    ->columnSpanFull(),
                TextInput::make('status')
                    ->label(__('admin.title.status'))
                    ->readonly()
                    ->columnSpanFull(),
            ]);
    }
}
