<?php

namespace App\Filament\Resources\Keys\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\CheckboxColumn;


class KeysTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('key')
                    ->label(__('admin.title.key'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('requests_used')
                    ->label(__('admin.title.requests_used'))
                    ->getStateUsing(fn (object $record) => $record->requestsused)
                    ->sortable(),
                CheckboxColumn::make('active')
                    ->label(__('admin.title.active'))
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
