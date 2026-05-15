<?php

namespace App\Filament\Resources\ProgramSessions\Pages;

use App\Filament\Resources\ProgramSessions\ProgramSessionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProgramSessions extends ListRecords
{
    protected static string $resource = ProgramSessionResource::class;
    protected function getHeaderActions(): array { return [CreateAction::make()]; }
}
