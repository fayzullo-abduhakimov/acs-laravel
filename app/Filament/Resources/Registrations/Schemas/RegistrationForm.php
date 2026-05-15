<?php

namespace App\Filament\Resources\Registrations\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class RegistrationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->columns(2)->components([
            TextInput::make('first_name'),
            TextInput::make('last_name'),
            TextInput::make('email'),
            TextInput::make('phone'),
            TextInput::make('address'),
            TextInput::make('city'),
            TextInput::make('state')->nullable(),
            TextInput::make('postal_code')->nullable(),
        ]);
    }
}
