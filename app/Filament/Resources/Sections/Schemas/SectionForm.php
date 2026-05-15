<?php

namespace App\Filament\Resources\Sections\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class SectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->columns(2)->components([
            TextInput::make('name')->required()->unique()->columnSpanFull(),
            TextInput::make('redirect_url')->columnSpanFull(),
            Toggle::make('is_opened')->label('Is Opened')->default(false),
            Toggle::make('status')->label('Active')->default(true),
        ]);
    }
}
