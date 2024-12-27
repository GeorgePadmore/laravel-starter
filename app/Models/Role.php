<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Role extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'uuid',
        'name',
        'code',
        'description',
        'default',
        'active'
    ];

    protected $casts = [
        'default' => 'boolean',
        'active' => 'boolean'
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($role) {
            $role->uuid = Str::uuid();
        });
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_roles')
            ->withTimestamps()
            ->withPivot('deleted_at');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permissions')
            ->withPivot('access_level')
            ->withTimestamps();
    }

    // public function hasPermission($permission)
    // {
    //     return $this->permissions->contains('code', $permission);
    // }

    // public function users()
    // {
    //     return $this->hasMany(User::class);
    // }

    // Scope for active roles
    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    // Check if role has a specific permission
    public function hasPermission(string $permissionCode, ?string $accessLevel = null)
    {
        $permission = $this->permissions()
            ->where('code', $permissionCode)
            ->first();

        if (!$permission) {
            return false;
        }

        // If access level is specified, check it
        if ($accessLevel && $permission->pivot->access_level !== $accessLevel) {
            return false;
        }

        return true;
    }
}
