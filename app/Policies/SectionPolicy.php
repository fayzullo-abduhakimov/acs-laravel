<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Section;
use Illuminate\Auth\Access\HandlesAuthorization;

class SectionPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('view_any_section');
    }

    public function view(AuthUser $authUser, Section $section): bool
    {
        return $authUser->can('view_section');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('create_section');
    }

    public function update(AuthUser $authUser, Section $section): bool
    {
        return $authUser->can('update_section');
    }

    public function delete(AuthUser $authUser, Section $section): bool
    {
        return $authUser->can('delete_section');
    }

    public function restore(AuthUser $authUser, Section $section): bool
    {
        return $authUser->can('restore_section');
    }

    public function forceDelete(AuthUser $authUser, Section $section): bool
    {
        return $authUser->can('force_delete_section');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('force_delete_any_section');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('restore_any_section');
    }

    public function replicate(AuthUser $authUser, Section $section): bool
    {
        return $authUser->can('replicate_section');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('reorder_section');
    }

}