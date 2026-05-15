<?php

namespace App\Filament\Resources\EventPrograms;

use App\Filament\Resources\EventPrograms\Pages\CreateEventProgram;
use App\Filament\Resources\EventPrograms\Pages\EditEventProgram;
use App\Filament\Resources\EventPrograms\Pages\ListEventPrograms;
use App\Filament\Resources\EventPrograms\Schemas\EventProgramForm;
use App\Filament\Resources\EventPrograms\Tables\EventProgramsTable;
use App\Models\EventProgram;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class EventProgramResource extends Resource
{
    protected static ?string $model = EventProgram::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::Calendar;

    public static function getNavigationGroup(): ?string { return __('app.label.event'); }
    public static function getModelLabel(): string { return 'Event Program'; }
    public static function getPluralModelLabel(): string { return 'Event Programs'; }
    public static function getNavigationSort(): int { return 1; }
    public static function getNavigationBadge(): ?string { return (string) static::$model::count(); }

    public static function form(Schema $schema): Schema { return EventProgramForm::configure($schema); }
    public static function table(Table $table): Table { return EventProgramsTable::configure($table); }

    public static function getPages(): array
    {
        return [
            'index'  => ListEventPrograms::route('/'),
            'create' => CreateEventProgram::route('/create'),
            'edit'   => EditEventProgram::route('/{record}/edit'),
        ];
    }
}
