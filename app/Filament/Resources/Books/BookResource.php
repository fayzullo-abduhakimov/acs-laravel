<?php

namespace App\Filament\Resources\Books;

use App\Filament\Resources\Books\Pages\CreateBook;
use App\Filament\Resources\Books\Pages\EditBook;
use App\Filament\Resources\Books\Pages\ListBooks;
use App\Filament\Resources\Books\Schemas\BookForm;
use App\Filament\Resources\Books\Tables\BooksTable;
use App\Models\Book;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BookResource extends Resource
{
    protected static ?string $model = Book::class;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::BookOpen;

    public static function getNavigationGroup(): ?string { return __('app.label.content'); }
    public static function getModelLabel(): string { return 'Book'; }
    public static function getPluralModelLabel(): string { return 'Books'; }
    public static function getNavigationSort(): int { return 2; }
    public static function getNavigationBadge(): ?string { return (string) static::$model::count(); }

    public static function form(Schema $schema): Schema { return BookForm::configure($schema); }
    public static function table(Table $table): Table { return BooksTable::configure($table); }

    public static function getPages(): array
    {
        return [
            'index'  => ListBooks::route('/'),
            'create' => CreateBook::route('/create'),
            'edit'   => EditBook::route('/{record}/edit'),
        ];
    }
}
