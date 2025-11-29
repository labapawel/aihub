<?php

namespace App\Filament\Resources\Aimodels\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\Action;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Model;
use Filament\Tables\Columns\CheckboxColumn;

class AimodelsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('admin.title.name'))
                    ->sortable()
                    ->searchable(),
                    // ->icon('heroicon-o-document-text'),
                TextColumn::make('description')
                    ->label(__('admin.title.description'))
                    ->limit(50),
                    // ->icon('heroicon-o-annotation'),
                TextColumn::make('minutes_count')
                    ->label(__('admin.title.runs_last_minute'))
                    ->sortable(),
                TextColumn::make('days_count')
                    ->label(__('admin.title.runs_last_day'))
                    ->sortable(),
                TextColumn::make('group.name')
                    ->label(__('admin.title.group'))
                    ->sortable(),
                 CheckboxColumn::make('active')
                    ->label(__('admin.title.active'))
                    ->sortable(),   

            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make()
                    ->icon('heroicon-o-pencil'),
                Action::make('clone')
                    ->label(__('admin.action.clone'))
                    ->icon('heroicon-o-document-duplicate')
                    ->form([
                        TextInput::make('new_name')
                            ->label(__('admin.title.new_record_name'))
                            ->required()
                            ->default(fn (Model $record) => $record->name),
                    ])
                    ->action(function (Model $record, array $data) {
                        $record->replicate()->fill([
                            'name' => $data['new_name'],
                        ])->save();
                    }),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->icon('heroicon-o-trash'),
                ]),
            ]);
    }
}
