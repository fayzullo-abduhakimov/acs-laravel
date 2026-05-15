<?php

namespace App\Filament\Resources\ProgramSessions\Pages;

use App\Filament\Resources\ProgramSessions\ProgramSessionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditProgramSession extends EditRecord
{
    protected static string $resource = ProgramSessionResource::class;
    protected function getHeaderActions(): array { return [DeleteAction::make()]; }
}
