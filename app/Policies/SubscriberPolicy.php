<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Subscriber;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubscriberPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('view_any_subscriber');
    }

    public function view(AuthUser $authUser, Subscriber $subscriber): bool
    {
        return $authUser->can('view_subscriber');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('create_subscriber');
    }

    public function update(AuthUser $authUser, Subscriber $subscriber): bool
    {
        return $authUser->can('update_subscriber');
    }

    public function delete(AuthUser $authUser, Subscriber $subscriber): bool
    {
        return $authUser->can('delete_subscriber');
    }

    public function restore(AuthUser $authUser, Subscriber $subscriber): bool
    {
        return $authUser->can('restore_subscriber');
    }

    public function forceDelete(AuthUser $authUser, Subscriber $subscriber): bool
    {
        return $authUser->can('force_delete_subscriber');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('force_delete_any_subscriber');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('restore_any_subscriber');
    }

    public function replicate(AuthUser $authUser, Subscriber $subscriber): bool
    {
        return $authUser->can('replicate_subscriber');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('reorder_subscriber');
    }

}