<?php

namespace App\Filament\Resources\EventPrograms\Pages;

use App\Filament\Resources\EventPrograms\EventProgramResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListEventPrograms extends ListRecords
{
    protected static string $resource = EventProgramResource::class;
    protected function getHeaderActions(): array { return [CreateAction::make()]; }
}
