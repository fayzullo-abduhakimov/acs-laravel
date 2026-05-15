<?php

namespace App\Filament\Resources\Registrations;

use App\Filament\Resources\Registrations\Pages\CreateRegistration;
use App\Filament\Resources\Registrations\Pages\EditRegistration;
use App\Filament\Resources\Registrations\Pages\ListRegistrations;
use App\Filament\Resources\Registrations\Schemas\RegistrationForm;
use App\Filament\Resources\Registrations\Tables\RegistrationsTable;
use App\Models\Registration;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class RegistrationResource extends Resource
{
    protected static ?string $model = Registration::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::ClipboardDocumentCheck;

    public static function getNavigationGroup(): ?string { return __('app.label.crm'); }
    public static function getModelLabel(): string { return 'Registration'; }
    public static function getPluralModelLabel(): string { return 'Registrations'; }
    public static function getNavigationSort(): int { return 1; }
    public static function getNavigationBadge(): ?string { return (string) static::$model::count(); }

    public static function form(Schema $schema): Schema { return RegistrationForm::configure($schema); }
    public static function table(Table $table): Table { return RegistrationsTable::configure($table); }

    public static function getPages(): array
    {
        return [
            'index'  => ListRegistrations::route('/'),
            'create' => CreateRegistration::route('/create'),
            'edit'   => EditRegistration::route('/{record}/edit'),
        ];
    }
}
