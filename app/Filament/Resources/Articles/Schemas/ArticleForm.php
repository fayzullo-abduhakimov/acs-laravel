<?php

namespace App\Filament\Resources\Articles\Schemas;

use AbdulmajeedJamaan\FilamentTranslatableTabs\TranslatableTabs;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->columns(2)->components([
            FileUpload::make('image')->image()->directory('articles')->columnSpanFull(),
            TextInput::make('slug')->columnSpanFull(),
            TranslatableTabs::make('translations')->columnSpanFull()->schema([
                TextInput::make('title')->required(),
                TextInput::make('description')->required(),
                RichEditor::make('content'),
            ]),
            DateTimePicker::make('published_date')->default(now()),
            TextInput::make('order_by')->label('Sort order')->numeric()->default(0),
            Toggle::make('status')->label('Active')->default(true)->columnSpanFull(),
        ]);
    }
}
