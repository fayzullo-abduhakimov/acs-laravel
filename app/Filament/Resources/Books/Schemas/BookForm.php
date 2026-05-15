<?php

namespace App\Filament\Resources\Books\Schemas;

use AbdulmajeedJamaan\FilamentTranslatableTabs\TranslatableTabs;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class BookForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->columns(2)->components([
            FileUpload::make('image')->image()->directory('books')->columnSpanFull(),
            FileUpload::make('file')->directory('books/files')->columnSpanFull(),
            TextInput::make('link')->columnSpanFull(),
            TranslatableTabs::make('translations')->columnSpanFull()->schema([
                TextInput::make('author')->required(),
                TextInput::make('name')->required(),
                RichEditor::make('description'),
            ]),
            TextInput::make('order_by')->label('Sort order')->numeric()->default(0),
            Toggle::make('status')->label('Active')->default(true)->columnSpanFull(),
        ]);
    }
}
