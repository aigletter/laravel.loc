<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders()
    {
        // user_id
        return $this->hasMany(Order::class, 'userId');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function canDo($action)
    {
        $roles = $this->roles;
        $userId = $roles[0]->pivot->created_at;
        //$this->roles; // Collection
        //$this->roles(); // Builder
        $roles = $this->roles()->with('permissions')->get()->filter(function (Role $role) use ($action) {
            $permissions = $role->permissions->filter(function (Permission $permission) use ($action) {
                return $permission->name === $action;
            });
            return (bool) $permissions->count();
        });

        return (bool) $roles->count();
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'comment', 'entity_type', 'entity_id');
    }
}
