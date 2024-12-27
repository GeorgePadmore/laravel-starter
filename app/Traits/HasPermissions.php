<?php

namespace App\Traits;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Collection;

trait HasPermissions
{
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles')
            ->withTimestamps();
    }

    public function hasRole(string|array|Collection $roles): bool
    {
        if (is_string($roles)) {
            return $this->roles->contains('code', $roles);
        }

        if ($roles instanceof Collection) {
            $roles = $roles->pluck('code')->toArray();
        }

        return $this->roles->pluck('code')->intersect($roles)->isNotEmpty();
    }

    public function hasPermission(string $permission): bool
    {
        return $this->getAllPermissions()->contains('code', $permission);
    }

    public function getAllPermissions(): Collection
    {
        return $this->roles->flatMap->permissions->unique('id');
    }

    public function hasAnyPermission(array|Collection $permissions): bool
    {
        if ($permissions instanceof Collection) {
            $permissions = $permissions->pluck('code')->toArray();
        }

        return $this->getAllPermissions()
            ->pluck('code')
            ->intersect($permissions)
            ->isNotEmpty();
    }
} 