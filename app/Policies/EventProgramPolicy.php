<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\EventProgram;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventProgramPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('view_any_event_program');
    }

    public function view(AuthUser $authUser, EventProgram $eventProgram): bool
    {
        return $authUser->can('view_event_program');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('create_event_program');
    }

    public function update(AuthUser $authUser, EventProgram $eventProgram): bool
    {
        return $authUser->can('update_event_program');
    }

    public function delete(AuthUser $authUser, EventProgram $eventProgram): bool
    {
        return $authUser->can('delete_event_program');
    }

    public function restore(AuthUser $authUser, EventProgram $eventProgram): bool
    {
        return $authUser->can('restore_event_program');
    }

    public function forceDelete(AuthUser $authUser, EventProgram $eventProgram): bool
    {
        return $authUser->can('force_delete_event_program');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('force_delete_any_event_program');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('restore_any_event_program');
    }

    public function replicate(AuthUser $authUser, EventProgram $eventProgram): bool
    {
        return $authUser->can('replicate_event_program');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('reorder_event_program');
    }

}