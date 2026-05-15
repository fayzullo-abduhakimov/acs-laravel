<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\ArchiveNews;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArchiveNewsPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('view_any_archive_news');
    }

    public function view(AuthUser $authUser, ArchiveNews $archiveNews): bool
    {
        return $authUser->can('view_archive_news');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('create_archive_news');
    }

    public function update(AuthUser $authUser, ArchiveNews $archiveNews): bool
    {
        return $authUser->can('update_archive_news');
    }

    public function delete(AuthUser $authUser, ArchiveNews $archiveNews): bool
    {
        return $authUser->can('delete_archive_news');
    }

    public function restore(AuthUser $authUser, ArchiveNews $archiveNews): bool
    {
        return $authUser->can('restore_archive_news');
    }

    public function forceDelete(AuthUser $authUser, ArchiveNews $archiveNews): bool
    {
        return $authUser->can('force_delete_archive_news');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('force_delete_any_archive_news');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('restore_any_archive_news');
    }

    public function replicate(AuthUser $authUser, ArchiveNews $archiveNews): bool
    {
        return $authUser->can('replicate_archive_news');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('reorder_archive_news');
    }

}