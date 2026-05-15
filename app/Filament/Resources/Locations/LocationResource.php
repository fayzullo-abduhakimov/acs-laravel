<?php

namespace App\Filament\Resources\Locations;

use App\Filament\Resources\Locations\Pages\CreateLocation;
use App\Filament\Resources\Locations\Pages\EditLocation;
use App\Filament\Resources\Locations\Pages\ListLocations;
use App\Filament\Resources\Locations\Schemas\LocationForm;
use App\Filament\Resources\Locations\Tables\LocationsTable;
use App\Models\Location;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class LocationResource extends Resource
{
    protected static ?string $model = Location::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::MapPin;

    public static function getNavigationGroup(): ?string { return __('app.label.event'); }
    public static function getModelLabel(): string { return 'Location'; }
    public static function getPluralModelLabel(): string { return 'Locations'; }
    public static function getNavigationSort(): int { return 2; }
    public static function getNavigationBadge(): ?string { return (string) static::$model::count(); }

    public static function form(Schema $schema): Schema { return LocationForm::configure($schema); }
    public static function table(Table $table): Table { return LocationsTable::configure($table); }

    public static function getPages(): array
    {
        return [
            'index'  => ListLocations::route('/'),
            'create' => CreateLocation::route('/create'),
            'edit'   => EditLocation::route('/{record}/edit'),
        ];
    }
}
