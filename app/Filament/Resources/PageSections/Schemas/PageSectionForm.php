<?php

namespace App\Filament\Resources\PageSections\Schemas;

use AbdulmajeedJamaan\FilamentTranslatableTabs\TranslatableTabs;
use App\Models\Page;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PageSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->columns(2)->components([
            Select::make('page_id')
                ->label('Page')
                ->options(Page::pluck('name', 'id'))
                ->required()
                ->searchable(),
            TextInput::make('name')->required(),
            FileUpload::make('image')->image()->disk('public')->directory('page-sections')->columnSpanFull(),
            TextInput::make('sort')->numeric()->default(0),
            TranslatableTabs::make('translations')->columnSpanFull()->schema([
                TextInput::make('title'),
                TextInput::make('subtitle'),
                RichEditor::make('content'),
            ]),
        ]);
    }
}
