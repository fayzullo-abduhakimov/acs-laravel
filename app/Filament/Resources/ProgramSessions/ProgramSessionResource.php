<?php

namespace App\Filament\Resources\ProgramSessions;

use App\Filament\Resources\ProgramSessions\Pages\CreateProgramSession;
use App\Filament\Resources\ProgramSessions\Pages\EditProgramSession;
use App\Filament\Resources\ProgramSessions\Pages\ListProgramSessions;
use App\Filament\Resources\ProgramSessions\Schemas\ProgramSessionForm;
use App\Filament\Resources\ProgramSessions\Tables\ProgramSessionsTable;
use App\Models\ProgramSession;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProgramSessionResource extends Resource
{
    protected static ?string $model = ProgramSession::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::ClipboardDocumentList;

    public static function getNavigationGroup(): ?string { return __('app.label.event'); }
    public static function getModelLabel(): string { return 'Program Session'; }
    public static function getPluralModelLabel(): string { return 'Program Sessions'; }
    public static function getNavigationSort(): int { return 4; }
    public static function getNavigationBadge(): ?string { return (string) static::$model::count(); }

    public static function form(Schema $schema): Schema { return ProgramSessionForm::configure($schema); }
    public static function table(Table $table): Table { return ProgramSessionsTable::configure($table); }

    public static function getPages(): array
    {
        return [
            'index'  => ListProgramSessions::route('/'),
            'create' => CreateProgramSession::route('/create'),
            'edit'   => EditProgramSession::route('/{record}/edit'),
        ];
    }
}
