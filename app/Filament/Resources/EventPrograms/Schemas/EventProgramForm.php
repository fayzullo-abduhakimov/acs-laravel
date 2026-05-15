<?php

namespace App\Filament\Resources\EventPrograms\Schemas;

use AbdulmajeedJamaan\FilamentTranslatableTabs\TranslatableTabs;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class EventProgramForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->columns(2)->components([
            DatePicker::make('day')->required(),
            TimePicker::make('start_time')->required(),
            TimePicker::make('end_time')->required(),
            Select::make('tag_id')
                ->relationship('tag', 'title')
                ->searchable()
                ->nullable(),
            Select::make('location_id')
                ->relationship('location', 'name')
                ->searchable()
                ->nullable(),
            TranslatableTabs::make('translations')->columnSpanFull()->schema([
                TextInput::make('title'),
                Textarea::make('description'),
            ]),
            TextInput::make('bg_color')->label('Background color'),
            TextInput::make('order_by')->label('Sort order')->numeric()->default(0),
            Toggle::make('status')->label('Active')->default(true)->columnSpanFull(),
        ]);
    }
}
