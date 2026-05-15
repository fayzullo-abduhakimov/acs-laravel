<?php

namespace App\Filament\Resources\Tags\Schemas;

use AbdulmajeedJamaan\FilamentTranslatableTabs\TranslatableTabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput as OrderInput;
use Filament\Schemas\Schema;

class TagForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            TranslatableTabs::make('translations')->schema([
                TextInput::make('title')->required(),
            ]),
            TextInput::make('order_by')->label('Sort order')->numeric()->default(0),
            Toggle::make('status')->label('Active')->default(true),
        ]);
    }
}
