<?php

namespace App\Filament\Resources\PageSections;

use App\Filament\Resources\PageSections\Pages\CreatePageSection;
use App\Filament\Resources\PageSections\Pages\EditPageSection;
use App\Filament\Resources\PageSections\Pages\ListPageSections;
use App\Filament\Resources\PageSections\RelationManagers\GalleryItemsRelationManager;
use App\Filament\Resources\PageSections\Schemas\PageSectionForm;
use App\Filament\Resources\PageSections\Tables\PageSectionsTable;
use App\Models\PageSection;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PageSectionResource extends Resource
{
    protected static ?string $model = PageSection::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::RectangleStack;

    public static function getNavigationGroup(): ?string { return __('app.label.content'); }
    public static function getModelLabel(): string { return 'Page Section'; }
    public static function getPluralModelLabel(): string { return 'Page Sections'; }
    public static function getNavigationSort(): int { return 5; }
    public static function getNavigationBadge(): ?string { return (string) static::$model::count(); }

    public static function form(Schema $schema): Schema { return PageSectionForm::configure($schema); }
    public static function table(Table $table): Table { return PageSectionsTable::configure($table); }

    public static function getRelationManagers(): array
    {
        return [
            GalleryItemsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListPageSections::route('/'),
            'create' => CreatePageSection::route('/create'),
            'edit'   => EditPageSection::route('/{record}/edit'),
        ];
    }
}
