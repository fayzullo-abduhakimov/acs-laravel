<?php

namespace App\Filament\Resources\Sections;

use App\Filament\Resources\Sections\Pages\CreateSection;
use App\Filament\Resources\Sections\Pages\EditSection;
use App\Filament\Resources\Sections\Pages\ListSections;
use App\Filament\Resources\Sections\Schemas\SectionForm;
use App\Filament\Resources\Sections\Tables\SectionsTable;
use App\Models\Section;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SectionResource extends Resource
{
    protected static ?string $model = Section::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::ViewColumns;

    public static function getNavigationGroup(): ?string { return __('app.label.structure'); }
    public static function getModelLabel(): string { return 'Section'; }
    public static function getPluralModelLabel(): string { return 'Sections'; }
    public static function getNavigationSort(): int { return 2; }
    public static function getNavigationBadge(): ?string { return (string) static::$model::count(); }

    public static function form(Schema $schema): Schema { return SectionForm::configure($schema); }
    public static function table(Table $table): Table { return SectionsTable::configure($table); }

    public static function getPages(): array
    {
        return [
            'index'  => ListSections::route('/'),
            'create' => CreateSection::route('/create'),
            'edit'   => EditSection::route('/{record}/edit'),
        ];
    }
}
