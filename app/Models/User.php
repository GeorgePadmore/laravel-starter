<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\HasPermissions;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;


class User extends Authenticatable
{
    use 
    // HasApiTokens, 
    HasFactory, Notifiable, SoftDeletes, HasPermissions;

    protected $fillable = [
        'uuid',
        'photo',
        'first_name',
        'last_name',
        'dob',
        'gender',
        'email',
        'email_verified_at',
        'phone',
        'phone_verified_at',
        'address',
        'username',
        'password',
        'pin',
        'active',
        'push_notification_app_id',
        'push_notification',
        'remember_token'
    ];

    protected $hidden = [
        'password',
        'pin',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'phone_verified_at' => 'datetime',
        'last_ussd_dial' => 'datetime',
        'password' => 'hashed',
        'pin' => 'hashed',
        'active' => 'boolean',
    ];


    // Automatically generate UUID when creating a user
    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($user) {
            $user->uuid = Str::uuid();
        });
    }
    

    //  // Relationship with roles (many-to-many)
    //  public function roles()
    //  {
    //      return $this->belongsToMany(Role::class, 'user_roles')
    //          ->withTimestamps()
    //          ->withPivot('deleted_at');
    //  }


     /**
     * Get the roles that belong to the user.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles');
    }

    public function hasRole($role)
    {
        Log::info('User: HasRole ', ['role' => $role]);
        if (is_string($role)) {
            Log::info('Roles: '. $this->roles->contains('code', $role));
            return $this->roles->contains('code', $role);
        }
        
        return (bool) $role->intersect($this->roles)->count();
    }

    /*
    public function hasPermission($permissionName)
    {
        return $this->roles()
            ->whereHas('permissions', function ($query) use ($permissionName) {
                $query->where('name', $permissionName)
                    ->where('active', true);
            })->exists();
    }
    */


     /**
     * Check if user has a specific permission.
     */
     public function hasPermission(string $permission): bool
     {
        //  return $this->roles->some(function ($role) use ($permissionCode, $accessLevel) {
        //      return $role->hasPermission($permissionCode, $accessLevel);
        //  });

         return $this->getAllPermissions()
            ->pluck('code')
            ->contains($permission);
     }
 
     // Check if user has any of the given roles
     public function hasAnyRole(array $roleCodes)
     {
         return $this->roles->contains(function ($role) use ($roleCodes) {
             return in_array($role->code, $roleCodes);
         });
     }


    // public function hasPermission($permission)
    // {
    //     return $this->roles->flatMap->permissions->contains('code', $permission);
    // }

    public function hasAnyPermission($permissions)
    {
        if (is_string($permissions)) {
            $permissions = [$permissions];
        }

        return $this->roles->flatMap->permissions
            ->whereIn('code', $permissions)
            ->isNotEmpty();
    }


    /**
     * Get all permissions for the user through their roles.
     */
    public function getAllPermissions()
    {
        return $this->roles->flatMap->permissions->unique('id');
    }

    /**
     * Get the direct permissions that belong to the user.
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'user_permissions');
    }
}
