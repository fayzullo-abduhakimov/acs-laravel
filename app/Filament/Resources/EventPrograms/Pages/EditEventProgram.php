<?php

namespace App\Filament\Resources\EventPrograms\Pages;

use App\Filament\Resources\EventPrograms\EventProgramResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditEventProgram extends EditRecord
{
    protected static string $resource = EventProgramResource::class;
    protected function getHeaderActions(): array { return [DeleteAction::make()]; }
}
