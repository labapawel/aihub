<?php

namespace App\Filament\Resources\Keys;

use App\Filament\Resources\Keys\Pages\CreateKey;
use App\Filament\Resources\Keys\Pages\EditKey;
use App\Filament\Resources\Keys\Pages\ListKeys;
use App\Filament\Resources\Keys\Schemas\KeyForm;
use App\Filament\Resources\Keys\Tables\KeysTable;
use App\Models\Key;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class KeyResource extends Resource
{
    protected static ?string $model = Key::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = '\App\Models\Key';

    public static function form(Schema $schema): Schema
    {
        return KeyForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KeysTable::configure($table);
    }

     public static function getPluralModelLabel(): string
        {
           return \Lang::get('admin.module.keys');
        }

    // public static function getNavigationGroup(): string
    //     {
    //         return \Lang::get('admin.title.modules_management');
    //     }

    public static function getNavigationLabel(): string
        {
                return \Lang::get('admin.module.keys');
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
            'index' => ListKeys::route('/'),
            'create' => CreateKey::route('/create'),
            'edit' => EditKey::route('/{record}/edit'),
        ];
    }
}
