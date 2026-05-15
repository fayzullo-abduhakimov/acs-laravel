<?php

namespace App\Filament\Resources\ArchiveNews\Pages;

use App\Filament\Resources\ArchiveNews\ArchiveNewsResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditArchiveNews extends EditRecord
{
    protected static string $resource = ArchiveNewsResource::class;
    protected function getHeaderActions(): array { return [DeleteAction::make()]; }
}
