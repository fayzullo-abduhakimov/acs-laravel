<?php

namespace App\Filament\Resources\Menus\Schemas;

use AbdulmajeedJamaan\FilamentTranslatableTabs\TranslatableTabs;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class MenuForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->columns(2)->components([
            TranslatableTabs::make('translations')->columnSpanFull()->schema([
                TextInput::make('title')->required(),
            ]),
            TextInput::make('link')->nullable()->columnSpanFull(),
            TextInput::make('order_by')->label('Sort order')->numeric()->default(0),
            Select::make('position')->options([1 => 'Header', 2 => 'Footer']),
            Select::make('parent_id')
                ->relationship('parent', 'title')
                ->searchable()
                ->nullable()
                ->placeholder('No parent')
                ->columnSpanFull(),
            Toggle::make('status')->label('Active')->default(true)->columnSpanFull(),
        ]);
    }
}
