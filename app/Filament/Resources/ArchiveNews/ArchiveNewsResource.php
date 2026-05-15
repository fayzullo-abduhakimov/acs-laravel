<?php

namespace App\Filament\Resources\ArchiveNews;

use App\Filament\Resources\ArchiveNews\Pages\CreateArchiveNews;
use App\Filament\Resources\ArchiveNews\Pages\EditArchiveNews;
use App\Filament\Resources\ArchiveNews\Pages\ListArchiveNews;
use App\Filament\Resources\ArchiveNews\Schemas\ArchiveNewsForm;
use App\Filament\Resources\ArchiveNews\Tables\ArchiveNewsTable;
use App\Models\ArchiveNews;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ArchiveNewsResource extends Resource
{
    protected static ?string $model = ArchiveNews::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::ArchiveBox;

    public static function getNavigationGroup(): ?string { return __('app.label.content'); }
    public static function getModelLabel(): string { return 'Archive News'; }
    public static function getPluralModelLabel(): string { return 'Archive News'; }
    public static function getNavigationSort(): int { return 3; }
    public static function getNavigationBadge(): ?string { return (string) static::$model::count(); }

    public static function form(Schema $schema): Schema { return ArchiveNewsForm::configure($schema); }
    public static function table(Table $table): Table { return ArchiveNewsTable::configure($table); }

    public static function getPages(): array
    {
        return [
            'index'  => ListArchiveNews::route('/'),
            'create' => CreateArchiveNews::route('/create'),
            'edit'   => EditArchiveNews::route('/{record}/edit'),
        ];
    }
}
