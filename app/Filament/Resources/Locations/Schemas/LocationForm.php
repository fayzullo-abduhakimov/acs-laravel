<?php

namespace App\Filament\Resources\Locations\Schemas;

use AbdulmajeedJamaan\FilamentTranslatableTabs\TranslatableTabs;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class LocationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->columns(2)->components([
            TextInput::make('name')->required()->columnSpanFull(),
            FileUpload::make('image')->image()->directory('locations')->columnSpanFull(),
            TranslatableTabs::make('translations')->columnSpanFull()->schema([
                TextInput::make('title')->required(),
                Textarea::make('content'),
            ]),
            TextInput::make('order_by')->label('Sort order')->numeric()->default(0),
            Toggle::make('status')->label('Active')->default(true)->columnSpanFull(),
        ]);
    }
}
