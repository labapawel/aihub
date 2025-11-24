<?php

namespace App\Filament\Resources\Aimodelruns\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class AimodelrunsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('aimodel.name')
                    ->label(__('admin.title.aimodel'))
                    ->sortable()
                    ->searchable(),
                TextColumn::make('input_data')
                    ->label(__('admin.title.input_data'))
                    ->limit(50)
                    ->wrap(),
                TextColumn::make('output_data')
                    ->label(__('admin.title.output_data'))
                    ->limit(50)
                    ->wrap(),
                TextColumn::make('status')
                    ->label(__('admin.title.status'))
                    ->sortable()
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label(__('admin.title.created_at'))
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
