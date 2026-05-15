<?php

namespace App\Filament\Resources\ProgramSessions\Schemas;

use AbdulmajeedJamaan\FilamentTranslatableTabs\TranslatableTabs;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProgramSessionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->columns(2)->components([
            Select::make('date_id')
                ->relationship('date', 'date')
                ->searchable()
                ->required()
                ->columnSpanFull(),
            TranslatableTabs::make('translations')->columnSpanFull()->schema([
                TextInput::make('title')->required(),
                RichEditor::make('content'),
            ]),
            TextInput::make('sort')->label('Sort order')->numeric()->default(0),
        ]);
    }
}
