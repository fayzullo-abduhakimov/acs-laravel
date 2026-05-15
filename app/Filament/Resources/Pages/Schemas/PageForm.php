<?php

namespace App\Filament\Resources\Pages\Schemas;

use AbdulmajeedJamaan\FilamentTranslatableTabs\TranslatableTabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->columns(2)->components([
            TextInput::make('name')->required()->columnSpanFull(),
            TextInput::make('slug')->required()->unique()->columnSpanFull(),
            TranslatableTabs::make('translations')->columnSpanFull()->schema([
                TextInput::make('title')->required(),
                TextInput::make('meta_title'),
                Textarea::make('meta_description'),
            ]),
        ]);
    }
}
