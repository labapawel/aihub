<?php

namespace App\Filament\Resources\Aimodels;

use App\Filament\Resources\Aimodels\Pages\CreateAimodel;
use App\Filament\Resources\Aimodels\Pages\EditAimodel;
use App\Filament\Resources\Aimodels\Pages\ListAimodels;
use App\Filament\Resources\Aimodels\Schemas\AimodelForm;
use App\Filament\Resources\Aimodels\Tables\AimodelsTable;
use App\Models\Aimodel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AimodelResource extends Resource
{
    protected static ?string $model = Aimodel::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = '\App\Models\Aimodel';

    public static function form(Schema $schema): Schema
    {
        return AimodelForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AimodelsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

     public static function getPluralModelLabel(): string
        {
           return \Lang::get('admin.module.aimodels');
        }

    // public static function getNavigationGroup(): string
    //     {
    //         return \Lang::get('admin.title.modules_management');
    //     }

    public static function getNavigationLabel(): string
        {
                return \Lang::get('admin.module.aimodels');
        }        


    public static function getPages(): array
    {
        return [
            'index' => ListAimodels::route('/'),
            'create' => CreateAimodel::route('/create'),
            'edit' => EditAimodel::route('/{record}/edit'),
        ];
    }
}
