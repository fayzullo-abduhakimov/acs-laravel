<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\ProgramSession;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProgramSessionPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('view_any_program_session');
    }

    public function view(AuthUser $authUser, ProgramSession $programSession): bool
    {
        return $authUser->can('view_program_session');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('create_program_session');
    }

    public function update(AuthUser $authUser, ProgramSession $programSession): bool
    {
        return $authUser->can('update_program_session');
    }

    public function delete(AuthUser $authUser, ProgramSession $programSession): bool
    {
        return $authUser->can('delete_program_session');
    }

    public function restore(AuthUser $authUser, ProgramSession $programSession): bool
    {
        return $authUser->can('restore_program_session');
    }

    public function forceDelete(AuthUser $authUser, ProgramSession $programSession): bool
    {
        return $authUser->can('force_delete_program_session');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('force_delete_any_program_session');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('restore_any_program_session');
    }

    public function replicate(AuthUser $authUser, ProgramSession $programSession): bool
    {
        return $authUser->can('replicate_program_session');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('reorder_program_session');
    }

}