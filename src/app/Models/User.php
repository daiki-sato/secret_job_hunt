<?php

namespace App\Models;

use App\Models\Role;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use SoftDeletes, Notifiable;

    protected $fillable = [
        'email',
        'password',
        'email_verified',
        'email_verify_token',
        'first_name',
        'last_name',
        'first_name_ruby',
        'last_name_ruby',
        'nickname',
        'sex',
        'role_id',
        'company',
        'department',
        'working_period',
        // 'remembe_token',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    public function delivery_addresses()
    {
        return $this->hasMany('App\Models\DeliveryAddress');
    }

    // public function hasRole(string $role)
    // {
    //     return $this->role->id === Role::getAdminId() || $this->role->name === $role;
    // }
}