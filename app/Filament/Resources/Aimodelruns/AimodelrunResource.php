<?php

namespace App\Filament\Resources\Aimodelruns;

use App\Filament\Resources\Aimodelruns\Pages\CreateAimodelrun;
use App\Filament\Resources\Aimodelruns\Pages\EditAimodelrun;
use App\Filament\Resources\Aimodelruns\Pages\ListAimodelruns;
use App\Filament\Resources\Aimodelruns\Schemas\AimodelrunForm;
use App\Filament\Resources\Aimodelruns\Tables\AimodelrunsTable;
use App\Models\Aimodelrun;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AimodelrunResource extends Resource
{
    protected static ?string $model = Aimodelrun::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = '\App\Models\Aimodelrun';

    public static function form(Schema $schema): Schema
    {
        return AimodelrunForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AimodelrunsTable::configure($table);
    }

     public static function getPluralModelLabel(): string
        {
           return \Lang::get('admin.module.aimodelruns');
        }

    // public static function getNavigationGroup(): string
    //     {
    //         return \Lang::get('admin.title.modules_management');
    //     }

    public static function getNavigationLabel(): string
        {
                return \Lang::get('admin.module.aimodelruns');
        }        



    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAimodelruns::route('/'),
            'create' => CreateAimodelrun::route('/create'),
            'edit' => EditAimodelrun::route('/{record}/edit'),
        ];
    }
}
