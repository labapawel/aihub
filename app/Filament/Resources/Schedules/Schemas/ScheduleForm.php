<?php

namespace App\Filament\Resources\Schedules\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;


class ScheduleForm
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
                DateTimePicker::make('start_time')
                    ->label(__('admin.title.start_time'))
                    ->required()
                    ->columnSpanFull(),
                DateTimePicker::make('end_time')
                    ->label(__('admin.title.end_time'))
                    ->required()
                    ->columnSpanFull(),
                    
            ]);
    }
}
