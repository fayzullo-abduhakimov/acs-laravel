<?php

namespace App\Filament\Resources\ArchiveNews\Pages;

use App\Filament\Resources\ArchiveNews\ArchiveNewsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListArchiveNews extends ListRecords
{
    protected static string $resource = ArchiveNewsResource::class;
    protected function getHeaderActions(): array { return [CreateAction::make()]; }
}
