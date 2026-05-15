<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\SocialLink;
use Illuminate\Auth\Access\HandlesAuthorization;

class SocialLinkPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('view_any_social_link');
    }

    public function view(AuthUser $authUser, SocialLink $socialLink): bool
    {
        return $authUser->can('view_social_link');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('create_social_link');
    }

    public function update(AuthUser $authUser, SocialLink $socialLink): bool
    {
        return $authUser->can('update_social_link');
    }

    public function delete(AuthUser $authUser, SocialLink $socialLink): bool
    {
        return $authUser->can('delete_social_link');
    }

    public function restore(AuthUser $authUser, SocialLink $socialLink): bool
    {
        return $authUser->can('restore_social_link');
    }

    public function forceDelete(AuthUser $authUser, SocialLink $socialLink): bool
    {
        return $authUser->can('force_delete_social_link');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('force_delete_any_social_link');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('restore_any_social_link');
    }

    public function replicate(AuthUser $authUser, SocialLink $socialLink): bool
    {
        return $authUser->can('replicate_social_link');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('reorder_social_link');
    }

}