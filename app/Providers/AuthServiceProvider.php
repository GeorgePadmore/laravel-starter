<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Cache;
use App\Models\Permission;
use App\Models\User;
// use Illuminate\Support\Facades\Log;

class AuthServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->registerPolicies();

        // Superadmin bypass
        Gate::before(function (?User $user, string $ability) {
            return $user && $user->hasRole('super_admin') ? true : null;
        });

        // Only register gates if they're not already cached
        Cache::tags(['permissions', 'system_config'])->remember('gates_registered', now()->addHours(24), function () {
            $permissions = Permission::active()->get();
            
            $permissions->each(function ($permission) {
                Gate::define($permission->code, function (?User $user) use ($permission) {
                    return $user ? $user->hasPermission($permission->code) : false;
                });
            });

            return true;
        });
    }
}
