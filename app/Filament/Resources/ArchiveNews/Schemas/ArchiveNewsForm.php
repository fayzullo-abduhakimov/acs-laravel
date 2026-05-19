<?php

namespace App\Filament\Resources\ArchiveNews\Schemas;

use AbdulmajeedJamaan\FilamentTranslatableTabs\TranslatableTabs;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ArchiveNewsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->columns(2)->components([
            FileUpload::make('image')->image()->disk('public')->directory('archive-news')->columnSpanFull(),
            TranslatableTabs::make('translations')->columnSpanFull()->schema([
                TextInput::make('title')->required(),
                Textarea::make('description'),
            ]),
            TextInput::make('order_by')->label('Sort order')->numeric()->default(0),
            Toggle::make('status')->label('Active')->default(true)->columnSpanFull(),
        ]);
    }
}
