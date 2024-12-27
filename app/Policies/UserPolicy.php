<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasPermission('USER_MANAGEMENT_READ');
    }

    public function view(User $user, User $targetUser): bool
    {
        return $user->hasPermission('USER_MANAGEMENT_READ')
            || $user->id === $targetUser->id;
    }

    public function create(User $user): bool
    {
        return $user->hasPermission('DRAW_MANAGEMENT_CREATE');
    }

    public function update(User $user, User $targetUser): bool
    {
        return $user->hasPermission('USER_MANAGEMENT_UPDATE')
            || $user->id === $targetUser->id;
    }

    public function delete(User $user, User $targetUser): bool
    {
        return $user->hasPermission('USER_MANAGEMENT_DELETE')
            && $user->id !== $targetUser->id;
    }

    public function restore(User $user, User $targetUser): bool
    {
        return $user->hasPermission('USER_MANAGEMENT_RESTORE');
    }

    public function forceDelete(User $user, User $targetUser): bool
    {
        return $user->hasPermission('USER_MANAGEMENT_FORCE_DELETE');
    }
} 