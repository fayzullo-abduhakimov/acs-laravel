<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Book;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('view_any_book');
    }

    public function view(AuthUser $authUser, Book $book): bool
    {
        return $authUser->can('view_book');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('create_book');
    }

    public function update(AuthUser $authUser, Book $book): bool
    {
        return $authUser->can('update_book');
    }

    public function delete(AuthUser $authUser, Book $book): bool
    {
        return $authUser->can('delete_book');
    }

    public function restore(AuthUser $authUser, Book $book): bool
    {
        return $authUser->can('restore_book');
    }

    public function forceDelete(AuthUser $authUser, Book $book): bool
    {
        return $authUser->can('force_delete_book');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('force_delete_any_book');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('restore_any_book');
    }

    public function replicate(AuthUser $authUser, Book $book): bool
    {
        return $authUser->can('replicate_book');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('reorder_book');
    }

}